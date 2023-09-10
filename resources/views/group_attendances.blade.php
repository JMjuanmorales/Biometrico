@extends('layouts.instructor')

@section('content')
<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda3.png') }}"></a>


    <h1>Panel de control del profesor</h1> 

    
    @if($students->isNotEmpty())
    <div class="botonVerExcusa" >
        <a href="{{ route('instructor.excuses',['group_id' => $group->id])}}" class="regresar">Ver Excusas</a>
    </div>
    <div class="botonVerExcusa" >
        <a href="{{ route('instructor.scan',['group_id' => $group->id])}}" class="regresar">Escaner</a>
    </div>
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
                        $firstAttendance = $student->attendances->first();
                    @endphp
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $date }}</td>
                        <td>{{ $firstAttendance && $firstAttendance->check_in_time ? \Carbon\Carbon::parse($firstAttendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                        <td>{{ $firstAttendance && $firstAttendance->check_out_time ? \Carbon\Carbon::parse($firstAttendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                        <td>{{ $firstAttendance ? $firstAttendance->status : 'Inasistente' }}</td>
                    </tr>
                    @foreach ($student->attendances->slice(1) as $additionalAttendance)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $date }}</td>
                            <td>{{ $additionalAttendance->check_in_time ? \Carbon\Carbon::parse($additionalAttendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $additionalAttendance->check_out_time ? \Carbon\Carbon::parse($additionalAttendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $additionalAttendance->status }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @else
        <h2>No hay estudiantes en este grupo.</h2>
    @endif
</div>
@endsection
