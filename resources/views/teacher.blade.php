@extends('layouts.app')

@section('content')
<div class="container">
    
    <button class="regresar" onclick="return window.history.back();">Retroceder</button>


    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <h1>Panel de control del profesor</h1>

    


    <div class="row">
        <div class="col">
            <a href="{{ route('teacher', ['show' => 'attendances']) }}" class="btn btn-primary">Mostrar asistencias</a>
            <a href="{{ route('teacher', ['show' => 'absences']) }}" class="btn btn-secondary">Mostrar faltas</a>
        </div>
    </div>
    
    <h2>Historial de asistencia de los estudiantes</h2>

    <table class="table">
        <thead>
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
                    $records = isset($absences) ? $absences : $attendances;
                @endphp
                @foreach ($records as $attendance)
                    @if ($attendance->user_id === $student->id)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $attendance->status }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    @if (isset($absences))
        {{ $absences->links() }}
    @else
        {{ $attendances->links() }}
    @endif
</div>
@endsection



@extends('layouts.app2')

@section('content')
<div class="container">
    <a class="boton" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <h1>Panel de control del profesor</h1> 

    <a href="{{ route('instructor.excuses') }}" class="btn btn-primary">Ver Excusas</a>

    @if($students->isNotEmpty())
        <h2>Historial de asistencia de los estudiantes - Grupo {{ $students->first()->group->name }}</h2>
    
        <table class="table">
            <thead>
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
                    @foreach ($student->attendances as $attendance)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $attendance->date }}</td>
                            <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                            <td>{{ $attendance->status }}</td>
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