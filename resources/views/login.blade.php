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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      @if (session('success'))
          Swal.fire(
              '¡Perfecto!',
              '{{ session('success') }}',
              'success'
          )
      @endif
    @if ($errors->any())
        var errorText = '';
        @foreach ($errors->all() as $error)
            errorText += '{{ $error }}<br>';
        @endforeach

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: errorText,
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    @endif
    </script>
  </div>
  <div class="right"></div>
</div>


@endsection