@extends('layouts.profile')

@section('content')

<a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha.png') }}"></a>


        
    <div class="registration-form">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-icon">
                <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
            </div>
                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control item" type="email" name="email">
                <button type="submit" class="btn btn-block create-account">Enviar enlace de restablecimiento de contraseña</button>
                <br>
                
        </form>
        
    </div>
    
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
@endsection