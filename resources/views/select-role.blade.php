@extends('layouts.roles')

@section('content')
<div class="container">
    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Salir') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <h1>Seleccione su rol</h1>
    <div class="fichas">

        
            @foreach($roles as $role)
                <div class="container2">
                        <div class="{{$role->name}}">
                            <div class="{{$role->name}}">
                                {{ ucfirst($role->name) }}
                            </div>
                            <div class="{{$role->name}}">
                                <form action="{{ route('set-selected-role') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="role" value="{{ $role->name }}">
                                    <button type="submit" class="rol">Ingresar como {{ ucfirst($role->name) }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
    </div>
</div>
@endsection
