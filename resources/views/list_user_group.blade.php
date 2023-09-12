@extends('layouts.admin')

@section('content')
<div class="container">

    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda.png') }}"></a>
   
    <h1>Lista de usuarios</h1>
    <h2>Ficha:{{$group->number}}</h2>
    @if($students->isNotEmpty())
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        
                            <a href="{{ route('admin.edit-user', ['id' => $student->id]) }}" class="regresar">Editar</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @else
        <h2>No hay estudiantes en este grupo.</h2>
    @endif
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