@extends('layouts.admin')

@section('content')
<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda.png') }}"></a>

    <h1>Crear Grupo</h1>

    <div class="registration-form">
    <form action="{{ route('admin.create-group') }}" method="POST">
        @csrf

        <div class="form-icon">
            <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
        </div>

        <div class="form-group">
            <label for="program_id">Programa:</label>
            <select class="form-control item" id="program_id" name="program_id" required>
                <option value="">Selecciona un programa</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ (old('program_id') == $program->id) ? 'selected' : '' }}>{{ $program->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="number">Número de Grupo:</label>
            <input type="number" class="form-control item" id="number" name="number" value="{{ old('number') }}" required placeholder="Número de Grupo">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Crear Grupo</button>
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