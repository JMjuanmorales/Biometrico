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
    /**
     * Muestra la vista para crear una nueva excusa.
     *
     * Este método simplemente retorna la vista donde el usuario puede enviar una nueva excusa.
     */
    public function create()
    {
        return view('create_excuse');
    }

    /**
     * Almacena una nueva excusa en la base de datos y un documento en Firebase Storage si se proporciona.
     *
     * Este método recopila la información del formulario, valida los datos y luego crea un nuevo registro en la tabla de excusas.
     * También maneja la carga de un documento opcional al almacenamiento de Firebase.
     *
     * Variables importantes:
     * - $excuse: Nuevo objeto de excusa que se guardará en la base de datos.
     * - $file: Archivo PDF subido por el usuario.
     * - $filename: Nombre generado para el archivo PDF.
     * - $firebaseStorage: Instancia de Firebase Storage.
     * - $bucket: Instancia del bucket de Firebase Storage.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos del formulario de acuerdo con las reglas establecidas.
     * - auth()->id(): Obtiene el ID del usuario actualmente autenticado.
     * - get($key): Obtiene un valor de la solicitud HTTP.
     * - hasFile($key): Verifica si un archivo fue subido para la clave dada en la solicitud HTTP.
     * - file($key): Obtiene el archivo subido para la clave dada en la solicitud HTTP.
     * - getClientOriginalExtension(): Obtiene la extensión original del archivo subido.
     * - app($service): Obtiene una instancia del servicio indicado (en este caso, Firebase Storage).
     * - getBucket(): Obtiene el bucket de Firebase Storage.
     * - upload($contents, $options): Sube un archivo al bucket de Firebase Storage.
     * - save(): Guarda el objeto de excusa en la base de datos.
     */
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

    /**
     * Descarga un archivo de excusa desde Firebase Storage.
     *
     * Este método genera una URL de descarga temporal para el archivo de excusa y redirige al usuario a esa URL.
     * Si el archivo no existe, se retorna un error.
     *
     * Variables importantes:
     * - $rutaArchivo: Ruta del archivo en Firebase Storage.
     * - $factory: Instancia de la fábrica de Firebase.
     * - $storage: Instancia de Firebase Storage.
     * - $bucket: Referencia al bucket de Firebase Storage.
     * - $archivoRef: Referencia al archivo en Firebase Storage.
     * - $url: URL de descarga temporal generada.
     *
     * Métodos importantes:
     * - base_path($path): Obtiene la ruta completa de un archivo.
     * - withServiceAccount($path): Configura la fábrica de Firebase con una cuenta de servicio.
     * - withDatabaseUri($uri): Configura la fábrica de Firebase con una URI de base de datos.
     * - getBucket(): Obtiene el bucket de Firebase Storage.
     * - object($path): Obtiene una referencia al objeto en Firebase Storage.
     * - exists(): Verifica si el objeto existe en Firebase Storage.
     * - signedUrl($expiry): Genera una URL de descarga temporal.
     *
     */
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
