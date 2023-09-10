@extends('layouts.profile')

@section('content')
    <div class="registration-form">
        
        <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha.png') }}"></a>


        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-icon">
                <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
            </div>

                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control item" type="email" name="email" required>
                
                

                <label for="password">Nueva contraseña</label>
                <input id="password" class="form-control item" type="password" name="password" required>
                

                <label for="password-confirm">Confirmar contraseña</label>
                <input id="password-confirm" class="form-control item" type="password" name="password_confirmation" required>
                <button type="submit" class="btn btn-block create-account">Restablecer contraseña</button>

                
        </form>
    </div>
@endsection