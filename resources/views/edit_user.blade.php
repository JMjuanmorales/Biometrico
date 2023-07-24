@extends('layouts.admin')

@section('content')

<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    <h1>Editar usuario</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="registration-form">
        <form class="form-horizontal" method="POST" action="{{ route('admin.update-user', ['id' => $user->id]) }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control item" name="name" value="{{ old('name', $user->name) }}" required placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="text" class="form-control item" name="email" value="{{ old('email', $user->email) }}" required placeholder="Correo electrónico">
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
                    <option value="">Ninguno</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->program->name }} - Grupo {{ $group->number }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Selecciona un grupo solo si el usuario es un estudiante.</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Actualizar usuario</button>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
