@extends('layouts.admin')

@section('content')
<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    
    <h1>Crear nuevo usuario</h1>

    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="registration-form">
    <form action="{{ route('admin.store-user') }}" method="POST">
        @csrf
        <div class="form-icon">
        <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control item" id="name" name="name" value="{{ old('name') }}" required placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="text" class="form-control item" id="email" name="email" value="{{ old('email') }}" required placeholder="Email">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control item" id="password" name="password" required placeholder="Password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" class="form-control item" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password">
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

        <div class="form-group">
            <label for="group_id">Grupo</label>
            <select class="form-control item" id="group_id" name="group_id">
                <option value="">Ninguno</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->program->name }} - Grupo {{ $group->number }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Selecciona un grupo solo si el usuario es un estudiante.</small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Crear usuario</button>
        </div>
    </form>

</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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