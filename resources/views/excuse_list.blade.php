@extends('layouts.instructor')

@section('content')
<div class="container">
    
    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda3.png') }}"></a>

    
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
                    <td>{{ $excuse->aprendiz->name }}</td>
                    <td>{{ $excuse->absence_date }}</td>
                    <td>{{ $excuse->justification }}</td>
                    <td>
                        @if ($excuse->document_path)
                        <a href="{{ route('descargar', ['filename' => $excuse->document_path]) }}"><img src="{{ url('images/pdf.png') }}" alt="hola"></a>
                        @else
                            No hay documento adjunto
                        @endif
                    </td>
                    <td>{{ $excuse->status }}</td>

                    <td>
                        @if ($excuse)
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