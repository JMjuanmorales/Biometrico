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
                <label for="name"><p>Email: {{ $user->email }}</p></label> 
            </div>
            <div class="form-group">
                <label for="name"><p>Fecha de registro: {{ $user->created_at->format('d-m-Y') }}</p></label>  
            </div>
            <div class="form-group">
                {{QrCode::size(150)->generate($user->id)}}
            </div>
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