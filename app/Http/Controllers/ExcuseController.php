<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $documentPath = $request->file('document') ? $request->file('document')->store('excuses') : null;

        $excuse = Excuse::create([
            'user_id' => auth()->id(),
            'absence_date' => $request->absence_date,
            'justification' => $request->justification,
            'document_path' => $documentPath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Excusa enviada correctamente.');
    }
}
