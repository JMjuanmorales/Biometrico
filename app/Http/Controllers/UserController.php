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
    //Descartados por como funciona el registro de usuarios

    /* public function showRegistrationForm()
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
    } */

    /*----------------------------------------------(:3)--------------------------------------------------------*/

    /**
     * Muestra el perfil del usuario autenticado.
     *
     * Este método recupera la información del usuario autenticado y su grupo, y muestra la vista del perfil.
     *
     * Variables importantes:
     * - $user: Usuario autenticado.
     * - $group: Grupo al que pertenece el usuario.
     *
     * Métodos importantes:
     * - view($viewName, $data): Devuelve la vista del perfil del usuario.
     */
    public function showProfile() {
        $user = Auth::user();
        $group = $user->group;

        return view('profile', compact('user', 'group'));
    }

    /**
     * Muestra el formulario para editar el perfil del usuario.
     *
     * Este método recupera la información del usuario autenticado y su grupo para mostrar el formulario de edición del perfil.
     *
     * Variables importantes:
     * - $user: Usuario autenticado.
     * - $group: Grupo al que pertenece el usuario.
     * - $roles: Roles del usuario.
     *
     * Métodos importantes:
     * - view($viewName, $data): Devuelve la vista para editar el perfil del usuario.
     */
    public function editProfile(){
        $user = Auth::user();
        $group = $user->group;
        $roles = $user->role;
        return view('edit_profile', compact('user'));
    }

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * Este método devuelve la vista que contiene el formulario para que los usuarios inicien sesión.
     *
     * Métodos importantes:
     * - view($viewName): Devuelve la vista del formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Autentica a un usuario en la aplicación.
     *
     * Este método valida las credenciales proporcionadas por el usuario. Si son válidas, inicia la sesión y redirige según el rol del usuario.
     *
     * Variables importantes:
     * - $credentials: Credenciales ingresadas por el usuario.
     * - $roles: Roles asociados con el usuario autenticado.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada.
     * - attempt($credentials): Intenta autenticar al usuario.
     * - session()->regenerate(): Regenera la sesión.
     * - session()->flash($key, $value): Almacena datos en la sesión para solo un viaje de solicitud posterior.
     */
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

    /**
     * Cierra la sesión del usuario.
     *
     * Este método cierra la sesión del usuario y redirige al formulario de inicio de sesión.
     *
     * Métodos importantes:
     * - logout(): Cierra la sesión del usuario.
     * - redirect()->route($routeName): Redirige al usuario al formulario de inicio de sesión.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    /**
     * Actualiza el perfil del usuario.
     *
     * Este método actualiza la información del perfil del usuario en la base de datos según los datos validados proporcionados.
     *
     * Variables importantes:
     * - $validatedData: Datos validados ingresados por el usuario.
     * - $id: ID del usuario que se va a actualizar.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada.
     * - findOrFail($id): Encuentra un modelo por su clave principal o lanza una excepción si no se encuentra.
     * - update($attributes): Actualiza el modelo en la base de datos.
     * - session()->flash($key, $value): Almacena datos en la sesión para solo un viaje de solicitud posterior.
     */
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
