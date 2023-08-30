@extends('layouts.aprendiz')

@section('content')

<div class="container">

    <button class="regresar" onclick="return window.history.back();">Retroceder</button>


    <h1>Mis excusas</h1>
    <table class="table">
        <thead class="cabeza">
            <tr>
                <th>Fecha de ausencia</th>
                <th class="espacio">Justificación</th>
                <th></th>
                <th></th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($excuses as $excuse)
                <tr>
                    <td>{{ $excuse->absence_date }}</td>
                    <td class="espacio">{{ $excuse->justification }}</td>
                    <td></td>
                    <td></td>
                    <td>{{ ucfirst($excuse->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
