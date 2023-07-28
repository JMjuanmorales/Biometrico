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
    public function showLinkRequestForm()
    {
        return view('email');
    }

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

        // Borramos cualquier token existente
        PasswordReset::where('email', $user->email)->delete();

        // Creamos un nuevo token
        $token = Str::random(60);
        PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
        ]);

        // Enviamos el email
        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return back()->with('success', 'Hemos enviado por correo electrónico el enlace de restablecimiento de contraseña!');
    }
}
