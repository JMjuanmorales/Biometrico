@extends('layouts.profile')

@section('content')
    

<a onclick="window.history.back()"><img class="atras" src="{{ url('images/flecha.png') }}"></a>

<h1>Perfil de {{ $user->name }}</h1>
<div class="registration-form">
    <form>
        <div class="form-icon">
            <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
        </div>
        <div class="form-group">
            <label for="name"><p>Nombres: {{ $user->name }}</p></label> 
        </div>
        <div class="form-group">
            <label for="last_name"><p>Apellidos: {{ $user->last_name }}</p></label> 
        </div>
        <div class="form-group">
            <label for="document_type"><p>Tipo de documento: {{ $user->document_type }}</p></label> 
        </div>
        <div class="form-group">
            <label for="document"><p>Numero de documento: {{ $user->document }}</p></label> 
        </div>
        <div class="form-group">
            <label for="email"><p>Email: {{ $user->email ? $user->email : 'Sin información' }}</p></label> 
        </div>
        <div class="form-group">
            <label for="born_date"><p>Fecha de nacimiento: {{ $user->born_date ? $user->born_date : 'Sin información' }}</p></label>
        </div>
        <div class="form-group">
            <label for="phone_number"><p>Número de teléfono: {{ $user->phone_number ? $user->phone_number : 'Sin información' }}</p></label>
        </div>
        <div class="form-group">
            <label for="emergency_number"><p>Número de emergencia: {{ $user->emergency_number ? $user->emergency_number : 'Sin información' }}</p></label>
        </div>
        <div class="form-group">
            <label for="created_at"><p>Fecha de registro: {{ $user->created_at->format('d-m-Y') }}</p></label>  
        </div>
        @if($user->hasRole('aprendiz'))
            <div class="form-group">
                {{ QrCode::size(150)->generate($user->id) }}
            </div>
        @endif
        <br>
        
        <div class="form-group">
            <a class="regresar" href="{{route('profile.edit')}}">Editar perfil</a> 
        </div>
    </form>

    
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 @if (session('success'))
    Swal.fire(
        '¡Perfecto!',
        '{{ session('success') }}',
        'success'
    )
@endif
</script>

    
</div>
@endsection