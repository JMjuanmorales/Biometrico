@extends('layouts.admin')

@section('content')
<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
   
    <h1>Lista de usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{ ucfirst($role->name) }}
                        @endforeach
                    </td>
                    <td>
                        @if ($user->group)
                            {{ $user->group->program->name }} - Grupo {{ $user->group->number }}
                        @else
                            No asignado
                        @endif
                    </td>
                    <td>
                        
                            <a href="{{ route('admin.edit-user', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 @if (session('success'))
    Swal.fire(
        '¡Excelente!',
        '{{ session('success') }}',
        'success'
    )
@endif
</script>
@endsection