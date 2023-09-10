@extends('layouts.aprendiz')

@section('content')

<div class="container">

    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda2.png') }}"></a>

    <h1>Bienvenido, {{ Auth::user()->name }}.</h1>

    <h2>Historial de asistencia</h2>

    <form method="GET" action="{{ route('dashboard') }}">
        <input type="date" name="date" class= "regresar"  value="{{ $selectedDate }}">
        <button type="submit" class="regresar">Filtrar</button>
    </form>

    @if ($attendanceStatuses->isEmpty())
        @if ($isToday)
            <p>Hoy no has registrado asistencia.</p>
        @else
            <p>No registraste asistencia este día. <small>No olvides subir la excusa.</small></p>
        @endif
    @endif

    <table class="table">
        <thead class="cabeza">
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($attendanceStatuses as $attendance)
                <tr>
                    <td></td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>
                        {{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : 'No registrado' }}
                    </td>
                    <td>
                        {{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : 'No registrado' }}
                    </td>
                    <td>{{ $attendance->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendanceStatuses->links() }}

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
