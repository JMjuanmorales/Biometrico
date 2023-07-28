@extends('layouts.aprendiz')

@section('content')

<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    

    <h1>Bienvenido, {{ Auth::user()->name }}.</h1>

    <form action="{{ route('attendance.check-in') }}" method="post">
        @csrf
        <button type="submit" class="botones1" id="creacion1">Marcar entrada</button>
    </form>
    <form action="{{ route('attendance.check-out') }}" method="post">
        @csrf
        <button type="submit" class="botones2" id="creacion">Marcar salida</button>
    </form>

    

    
    <h2>Historial de asistencia</h2>

    <form method="GET" action="{{ route('dashboard') }}">
        <input type="date" name="date" class= "regresar"  value="{{ request('date') }}">
        <button type="submit" class="regresar">Filtrar</button>
    </form>
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
            @foreach ($attendanceStatuses as $attendanceStatus)
                <tr>
                    <td></td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ $attendanceStatus['date'] }}</td>
                    <td>
                        @if ($attendanceStatus['status'] == 'absent')
                            No registrado
                        @else
                            {{ $attendanceStatus['check_in_time'] ? \Carbon\Carbon::parse($attendanceStatus['check_in_time'])->format('H:i') : 'No registrado' }}
                        @endif
                    </td>
                    <td>
                        @if ($attendanceStatus['status'] == 'absent')
                            No registrado
                        @else
                            {{ $attendanceStatus['check_out_time'] ? \Carbon\Carbon::parse($attendanceStatus['check_out_time'])->format('H:i') : 'No registrado' }}
                        @endif
                    </td>
                    <td>{{ $attendanceStatus['status'] == 'absent' ? 'Faltó' : $attendanceStatus['status'] }}</td>
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
