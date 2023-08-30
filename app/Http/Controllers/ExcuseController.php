<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            
            $excuse->status = 'pending';
            $excuse->save();


        return redirect()->route('dashboard')->with('success', 'Excusa enviada correctamente.');
    }
}
