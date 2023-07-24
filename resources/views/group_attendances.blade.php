@extends('layouts.instructor')

@section('content')
<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    
    <h1>Panel de control del profesor</h1> 

    <div class="botonVerExcusa" >
        <a href="{{ route('instructor.excuses',['group_id' => $group->id])}}" class="verExcusa">Ver Excusas</a>
    </div>
    @if($students->isNotEmpty())
        <h2>Historial de asistencia de los estudiantes - Grupo {{ $students->first()->group->name }}</h2>

        <form method="GET" action="{{ route('instructor.group', ['group_id' => $group->id]) }}">
            <label for="date">Fecha:</label>
            <input type="date" id="date" name="date" class="regresar" value="{{ $date }}">
            <button type="submit" class="regresar">Filtrar</button>
        </form>
    
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Estudiante</th>
                    <th>Fecha</th>
                    <th>Hora de entrada</th>
                    <th>Hora de salida</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    @php
                        $attendance = $student->attendances->first();
                    @endphp
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $date }}</td>
                        <td>{{ $attendance && $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                        <td>{{ $attendance && $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                        <td>{{ $attendance ? $attendance->status : 'Inasistente' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>No hay estudiantes en este grupo.</h2>
    @endif
</div>
@endsection
