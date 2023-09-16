@extends('layouts.instructor')

@section('content')
<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda3.png') }}"></a>


    <h1>Panel de control del instructor</h1> 

    
    @if($students->isNotEmpty())
    <div class="botonVerExcusa" >
        <a href="{{ route('instructor.excuses',['group_id' => $group->id])}}" class="regresar">Ver Excusas</a>
    </div>
    <div class="botonVerExcusa" >
        <a href="{{ route('instructor.scan',['group_id' => $group->id])}}" class="regresar">Escáner</a>
    </div>
        <h2>Historial de asistencia de los estudiantes - Ficha {{ $students->first()->group_id}}</h2>

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
                        $wasStudentRegistered = \Carbon\Carbon::parse($student->created_at)->toDateString() <= $date;
                    @endphp
                    @if ($student->attendances->isEmpty())
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $date }}</td>
                            @if($wasStudentRegistered)
                                <td colspan="3">No ha registrado asistencia {{ $date == now()->toDateString() ? "hoy" : "este día" }}</td>
                            @else
                                <td colspan="3">No estaba registrado en el sistema en esta fecha</td>
                            @endif
                        </tr>
                    @else
                        @foreach ($student->attendances as $attendance)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $date }}</td>
                                <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                                <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                                <td>{{ $attendance->status }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <h2>No hay estudiantes en este grupo.</h2>
    @endif
</div>
@endsection
