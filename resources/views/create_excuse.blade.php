@extends('layouts.aprendiz')

@section('content')



<div class="container">
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda2.png') }}"></a>
    <h1>Enviar excusa</h1>

    <div class="registration-form">
        <form action="{{ route('excuse.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="absence_date">Fecha de ausencia:</label>
                <input type="date" name="absence_date" id="absence_date" class="form-control item" required>
            </div>

            <div class="form-group">
                <label for="justification">Justificación:</label>
                <input type="text" name="justification" id="justification" class="form-control item" required>
            </div>

            <div class="form-group">
                <label for="document">Adjuntar documento:</label>
                <input type="file" name="document" id="document" class="custom-input-file">
            </div>

            <br>
            <br>

            <div class="form-group">
                <button type="submit" class="regresar">Enviar excusa</button>
            </div>
        </form>
    </div>
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
@endsection