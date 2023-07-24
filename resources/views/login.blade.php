@extends('layouts.login')

@section('content')
<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Bienvenido</h2>
      <h4 class="animation a2">Inicia sesión en tu cuenta usando correo <br>electrónico y contraseña</h4>
    </div>
    <form action="{{ route('login') }}" method="post" class="form">
      @csrf
      <input type="email" name="email" id="email" class="form-field animation a3" placeholder="Correo electrónico" required>
      <input type="password" name="password" id="password" class="form-field animation a4" placeholder="Contraseña" required>
      
      <button type="submit" class="animation a6">Iniciar sesión</button>
      <br>
      <p class="animation a5"><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
    </form>
    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
    @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                </div>
    @endif
  </div>
  <div class="right"></div>
</div>


@endsection