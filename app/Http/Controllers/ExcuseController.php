<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Factory;
use Illuminate\Support\Carbon;
use Google\Cloud\Core\ExponentialBackoff;
use Kreait\Firebase\ServiceAccount;

class ExcuseController extends Controller
{
    public function create()
    {
        return view('create_excuse');
    }

public function store(Request $request)
    {
        $request->validate([
            'absence_date' => 'required|date',
            'justification' => 'required',
            'document' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $excuse = new Excuse();

            $excuse->user_id = auth()->id();
            $excuse->absence_date = $request->get('absence_date');
            $excuse->justification = $request->get('justification');

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = 'Excusa' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            
                // Almacenar el archivo en Firebase Storage
                $firebaseStorage = app('firebase.storage');
                $bucket = $firebaseStorage->getBucket();
                $bucket->upload(file_get_contents($file), [
                    'name' => 'files/excuses/' . $filename,
                ]);

                
    
                $excuse->document_path = $filename;
            };
            
            $excuse->status = 'Pendiente';
            $excuse->save();

            session()->flash('success', 'Excusa enviada correctamente');

            return redirect()->route('dashboard');
    }

    public function download($filename)
{
    try {

        $rutaArchivo = 'files/excuses/' . $filename;

        // Carga las credenciales desde el archivo JSON directamente
        $pathToServiceAccount = base_path('storage_credentials.json'); 

        // Crea una instancia de Firebase
        $factory = (new Factory)
                    ->withServiceAccount($pathToServiceAccount)
                    ->withDatabaseUri('https://biometric-service-35fc8.firebaseio.com');

        // Obtiene una instancia de Firebase Storage
        $storage = $factory->createStorage();

        // Obtiene una referencia al bucket
        $bucket = $storage->getBucket();

        // Obtiene una referencia al archivo en Firebase Storage
        $archivoRef = $bucket->object($rutaArchivo);

        // Verifica si el objeto existe
        if ($archivoRef->exists()) {
            // Genera una URL de descarga firmada para el archivo (válida por 15 minutos)
            $url = $archivoRef->signedUrl(now()->addMinutes(15));

            // Redirige al usuario a la URL de descarga
            return redirect($url);
        } else {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al descargar el archivo: ' . $e->getMessage()], 500);
    }
    }
}
