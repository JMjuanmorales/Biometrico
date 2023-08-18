@extends('layouts.admin')

@section('content')

<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    <h1>Editar usuario</h1>


    <div class="registration-form">
        <form class="form-horizontal" method="POST" action="{{ route('admin.update-user', ['id' => $user->id]) }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombres</label>
                <input id="name" type="text" class="form-control item" name="name" value="{{ old('name', $user->name) }}" placeholder="Nombres">
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input id="last_name" type="text" class="form-control item" name="last_name" value="{{ old('name', $user->last_name) }}" placeholder="Apellidos">
            </div>


            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="text" class="form-control item" name="email" value="{{ old('email', $user->email) }}" placeholder="Correo electrónico">
            </div>

            <div class="form-group">
                <label for="document_type">document_type</label>
                <select name="document_type" id="document_type" value="CC">
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="CE">CE</option>
                  </select>
            </div>
    
            <div class="form-group">
                <label for="document">Numero de documento</label>
                <input type="text" class="form-control item" id="document" name="document" value="{{ old('document', $user->document) }}" placeholder="Numero de documento">
            </div>
    
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
                <label for="roles">Roles:</label>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->name }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label class="form-check-label" for="role_{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="group_id">Grupo</label>
                <select class="form-control item" id="group_id" name="group_id">
                    @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $group->id === $user->group_id ? 'selected' : '' }}>
                        {{ $group->program->name }} - Grupo {{ $group->number }}
                    </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Selecciona un grupo solo si el usuario es un estudiante.</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Actualizar usuario</button>
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
