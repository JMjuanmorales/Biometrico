<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordReset;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (! $passwordReset) {
            return redirect()->route('password.request')->withErrors(['email' => 'El token es inválido.']);
        }

        return view('reset', ['token' => $token]);
    }

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

        return redirect()->route('login')->with('status', '¡Contraseña cambiada con éxito!');
    }
}