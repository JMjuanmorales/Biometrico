@extends('layouts.formulario')

@section('content')

<!--<a class="regresar" href="" >
    {{ __('Regresar') }}
</a>-->

        
    <div class="registration-form">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-icon">
                <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
            </div>
                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control item" type="email" name="email" required>
                <button type="submit" class="btn btn-block create-account">Enviar enlace de restablecimiento de contraseña</button>
                <br>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
        </form>
        
    </div>
    

@endsection