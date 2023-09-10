@extends('layouts.admin')

@section('content')
<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda.png') }}"></a>
    
    
    
    <h1>Crear Programa</h1>

    <div class="registration-form">
    <form action="{{ route('admin.create-program') }}" method="POST">
        @csrf

        <div class="form-icon">
            <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
        </div>

        <div class="form-group">
            <label for="name">Nombre del Programa:</label>
            <input type="text" class="form-control item" id="name" name="name" value="{{ old('name') }}" required placeholder="Nombre del Programa">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Crear Programa</button>
        </div>

    </form>
</div>
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
@endsection