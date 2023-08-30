@extends('layouts.app')

@section('content')
<div class="container">

    <button class="regresar" onclick="return window.history.back();">Retroceder</button>


    <h1>Asistencias del grupo {{ $group->name }} en la fecha {{ $date }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}</td>
                    <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}</td>
                    <td>{{ $attendance->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection