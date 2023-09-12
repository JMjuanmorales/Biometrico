<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function showProfile() {
        $user = Auth::user();
        $group = $user->group;

        return view('profile', compact('user', 'group'));
    }

    public function editProfile(){
        $user = Auth::user();
        $group = $user->group;
        $roles = $user->role;
        return view('edit_profile', compact('user'));
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
            $roles = $user->roles;
    
            if ($roles->count() > 1) {
                return redirect()->route('select-role');
            } else {
                $role = $roles->first()->name;
                session(['selected_role' => $role]);
    
                switch ($role) {
                    case 'aprendiz':
                        session()->flash('success', 'Inicio de sesion exitoso');
                        return redirect()->route('dashboard');
                    case 'instructor':
                        session()->flash('success', 'Inicio de sesion exitoso');
                        return redirect()->route('instructor.groups');
                    case 'admin':
                        session()->flash('success', 'Inicio de sesion exitoso');
                        return redirect()->route('admin.create-user');
                    default:
                        return redirect()->back()->with('error', 'Inicio de sesion fallido');
                }
            }
        }
    
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function updateProfile(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'born_date' => 'nullable|max:255',
            'phone_number'=> 'nullable|max:255',
            'emergency_number' => 'nullable|max:255', 
            'roles' => 'array',
            'roles.*' => 'in:student,instructor,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'born_date' => $validatedData['born_date'],
            'phone_number' => $validatedData['phone_number'],
            'emergency_number' => $validatedData['emergency_number'],
            
        ]);

        session()->flash('success', 'Perfil actualizado correctamente');

        return redirect()->route('profile.show');
    }

}
