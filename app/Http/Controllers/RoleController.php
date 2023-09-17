<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Muestra una vista para que el usuario seleccione su rol.
     *
     * Este método recupera los roles asociados al usuario autenticado y pasa estos roles a una vista para que el usuario pueda seleccionar su rol.
     *
     * Variables importantes:
     * - $roles: Array de roles asociados al usuario autenticado.
     *
     * Métodos importantes:
     * - Auth::user()->roles: Obtiene los roles del usuario autenticado.
     * - view($viewName, $data): Devuelve una vista con los roles disponibles.
     */
    public function selectRole()
    {
        $roles = Auth::user()->roles;
        return view('select-role', compact('roles'));
    }

    /**
     * Establece el rol seleccionado para el usuario y lo redirige a la vista correspondiente.
     *
     * Este método valida el rol seleccionado por el usuario, lo almacena en la sesión y luego redirige al usuario a la página correspondiente según el rol seleccionado.
     *
     * Variables importantes:
     * - $request->role: Rol seleccionado por el usuario.
     *
     * Métodos importantes:
     * - validate($rules): Valida el rol seleccionado por el usuario contra una lista predefinida de roles permitidos.
     * - session(['key' => $value]): Almacena el rol seleccionado en la sesión del usuario.
     * - redirect()->route($route): Redirige al usuario a una ruta específica en función del rol seleccionado.
     * 
     * Condiciones importantes:
     * - 'aprendiz': Redirige al usuario a la vista de aprendiz.
     * - 'instructor': Redirige al usuario a la vista del instructor.
     * - 'admin': Redirige al usuario a la vista del administrador.
     * - default: Redirige al usuario a la página de inicio.
     */
    public function setSelectedRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:aprendiz,instructor,admin',
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
