<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    /**
     * Muestra el formulario para ingresar el correo electrónico y solicitar el enlace de restablecimiento de contraseña.
     *
     * Este método simplemente devuelve la vista del formulario donde el usuario puede ingresar su correo electrónico para solicitar un enlace de restablecimiento de contraseña.
     */
    public function showLinkRequestForm()
    {
        return view('email');
    }

    /**
     * Envía un enlace de restablecimiento de contraseña al correo electrónico proporcionado.
     *
     * Este método valida el correo electrónico ingresado, verifica si el usuario existe y, si es así, envía un correo electrónico con el enlace de restablecimiento de contraseña.
     *
     * Variables importantes:
     * - $user: Objeto de usuario que corresponde al correo electrónico ingresado.
     * - $token: Token generado aleatoriamente para el enlace de restablecimiento de contraseña.
     *
     * Métodos importantes:
     * - validate($rules, $messages): Valida el correo electrónico.
     * - where($column, $value): Filtra los registros de usuario por columna y valor.
     * - first(): Obtiene el primer resultado de la consulta.
     * - delete(): Elimina registros antiguos de restablecimiento de contraseña para el correo electrónico dado.
     * - create($attributes): Crea un nuevo registro de restablecimiento de contraseña.
     * - Mail::to($email)->send($mailable): Envía un correo electrónico al usuario.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'Debe ingresar el correo'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No hay ningún usuario con esa dirección de correo electrónico.']);
        }

        PasswordReset::where('email', $user->email)->delete();

        $token = Str::random(60);
        PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Hemos enviado por correo electrónico el enlace de restablecimiento de contraseña!');
    }
}
