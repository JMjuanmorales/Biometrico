<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordReset;

class ResetPasswordController extends Controller
{
    /**
     * Muestra el formulario de restablecimiento de contraseña si el token es válido.
     *
     * Este método verifica la validez del token y muestra el formulario de restablecimiento de contraseña si el token es válido.
     *
     * Variables importantes:
     * - $passwordReset: Objeto que contiene información sobre el token de restablecimiento de contraseña.
     *
     * Métodos importantes:
     * - where($column, $value): Filtra los registros de restablecimiento de contraseña por columna y valor.
     * - first(): Obtiene el primer resultado de la consulta.
     * - redirect()->route($route)->withErrors($errors): Redirige al usuario con errores.
     */
    public function showResetForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (! $passwordReset) {
            return redirect()->route('password.request')->withErrors(['email' => 'El token es inválido.']);
        }

        return view('reset', ['token' => $token]);
    }

    /**
     * Restablece la contraseña del usuario.
     *
     * Este método valida la información del formulario y, si el token es válido, restablece la contraseña del usuario.
     *
     * Variables importantes:
     * - $passwordReset: Objeto que contiene información sobre el token de restablecimiento de contraseña.
     * - $user: Objeto de usuario que corresponde al correo electrónico relacionado con el token.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos del formulario.
     * - where($column, $value): Filtra los registros de restablecimiento de contraseña por columna y valor.
     * - first(): Obtiene el primer resultado de la consulta.
     * - Hash::make($value): Cifra la nueva contraseña.
     * - save(): Guarda el nuevo valor de la contraseña en la base de datos.
     * - delete(): Elimina el token de restablecimiento de contraseña utilizado.
     * - session()->flash($key, $value): Almacena un mensaje temporal en la sesión.
     * - redirect()->route($route): Redirige al usuario a una ruta específica.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if (! $passwordReset) {
            return redirect()->route('password.request')->withErrors(['email' => 'El token es inválido.']);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (! $user) {
            return redirect()->route('password.request')->withErrors(['email' => 'No se encontró ningún usuario con este correo electrónico.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $passwordReset->delete();

        session()->flash('success', '¡Contraseña cambiada con éxito!');

        return redirect()->route('login');
    }
}