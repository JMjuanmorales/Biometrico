@extends('layouts.profile')

@section('content')

<a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha.png') }}"></a>

    <h1>Restablecimiento de contraseña</h1>
    <p>Has solicitado restablecer tu contraseña. Haz clic en el enlace de abajo para continuar:</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Restablecer contraseña</a>

@endsection