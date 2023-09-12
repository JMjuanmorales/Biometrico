@extends('layouts.profile')

@section('content')

<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha.png') }}"></a>


    <h1>Editar Perfil</h1>


    <div class="registration-form">
        <form class="form-horizontal" method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}">
            @csrf


    
            <div class="form-group">
                <label for="born_date">Fecha de nacimiento</label>
                <input type="date" class="form-control item" id="born_date" name="born_date" value="{{ old('born_date', $user->born_date) }}" placeholder="Fecha de nacimiento">
            </div>
    
            <div class="form-group">
                <label for="phone_number">Numero celular</label>
                <input type="text" class="form-control item" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"  placeholder="Numero celular">
            </div>
    
            <div class="form-group">
                <label for="emergency_number">Numero emergencia</label>
                <input type="text" class="form-control item" id="emergency_number" name="emergency_number" value="{{ old('emergency_number', $user->emergency_number) }}" placeholder="Numero emergencia">
            </div>

            

           

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Actualizar perfil</button>
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
