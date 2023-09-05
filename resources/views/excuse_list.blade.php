@extends('layouts.instructor')

@section('content')
<div class="container">
    
    <button class="regresar" onclick="return window.history.back();">Retroceder</button>

    
    <h1>Lista de excusas</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Fecha de ausencia</th>
                <th>Justificación</th>
                <th>Documento</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($excuses as $excuse)
                <tr>
                    <td>{{ $excuse->student->name }}</td>
                    <td>{{ $excuse->absence_date }}</td>
                    <td>{{ $excuse->justification }}</td>
                    <td>
                        @if ($excuse->document_path)
                            <a href="{{ asset('https://firebasestorage.googleapis.com/v0/b/biometric-service-35fc8.appspot.com/o/files%2Fexcuses%2FExcusayGYKn.pdf?alt=media&token=33bf11bd-53b4-45b4-b83e-1d4cd3c9603d'. $excuse->document_path) }}" download="{{ $excuse->name }} - {{ $excuse->document_path }}">
                                <img src="{{ url('images/pdf.png') }}" alt="hola">
                            </a>
                        @else
                            No hay documento adjunto
                        @endif
                    </td>
                    <td>{{ $excuse->status }}</td>

                    <td>
                        @if ($excuse->status === 'pending')
                            <a href="{{ route('excuse.approve', ['id' => $excuse->id]) }}" class="botones2">Aceptar</a>
                            <a href="{{ route('excuse.reject', ['id' => $excuse->id]) }}" class="botones1">Rechazar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection