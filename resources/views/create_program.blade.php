@extends('layouts.admin')

@section('content')
<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    <h1>Crear Programa</h1>

    <div class="registration-form">
    <form action="{{ route('admin.create-program') }}" method="POST">
        @csrf

        <div class="form-icon">
            <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
        </div>

        <div class="form-group">
            <label for="name">Nombre del Programa:</label>
            <input type="text" class="form-control item" id="name" name="name" value="{{ old('name') }}" required placeholder="Nombre del Programa">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Crear Programa</button>
        </div>

    </form>
</div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection