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
                    case 'student':
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
    
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
