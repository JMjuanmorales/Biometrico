@extends('layouts.admin')

@section('content')
    
<div class="container">

    <button class="regresar" onclick="window.history.back()">Retroceder</button>

    <h1>Crear varios usuarios</h1>

    <div class="registration-form">
        
            

            <form action="{{ route('admin.store-users') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="user_file">Selecionar archivo:</label>
                    <input type="file" class="form-control" id="user_file" name="user_file">
                </div>
                <div class="form-group">
                    <label for="roles">Roles:</label>
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->name }}">
                            <label class="form-check-label" for="role-{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                        </div>
                    @endforeach
                </div>

                <!-- Agrega más campos del formulario según sea necesario -->
                
                <button type="submit" class="regresar">Registrar</button>
            </form>
        
    </div>
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
</div>
@endsection
