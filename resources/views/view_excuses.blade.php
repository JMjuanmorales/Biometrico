@extends('layouts.aprendiz')

@section('content')

<div class="container">

    <a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha-izquierda2.png') }}"></a>


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
