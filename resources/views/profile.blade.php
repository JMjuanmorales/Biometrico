@extends('layouts.roles')

@section('content')
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->

<h1>Perfil de {{ $user->name }}</h1>
<div class="registration-form">
    <form>
            <div class="form-icon">
                <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
            </div>
            <div class="form-group">
                <label for="name"><p>Email: {{ $user->email }}</p></label> 
            </div>
            <div class="form-group">
                <label for="name"><p>Fecha de registro: {{ $user->created_at->format('d-m-Y') }}</p></label>  
            </div>
            

    </form>
    

    <!-- Aquí puedes agregar más campos según los que tengas en tu tabla de usuarios -->

    
</div>
@endsection