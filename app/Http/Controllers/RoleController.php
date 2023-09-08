<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function selectRole()
    {
        $roles = Auth::user()->roles;
        return view('select-role', compact('roles'));
    }

    public function setSelectedRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:student,instructor,admin',
        ]);

        session(['selected_role' => $request->role]);

        switch ($request->role) {
            case 'aprendiz':
                return redirect()->route('dashboard');
            case 'instructor':
                return redirect()->route('instructor.groups');
            case 'admin':
                return redirect()->route('admin.create-user');
            default:
                return redirect()->route('home');
        }
    }
}
