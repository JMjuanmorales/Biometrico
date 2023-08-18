@extends('layouts.instructor')

@section('content')

<div class="container">
    
    
    <div class="p-5">

        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h3 class="textGrupos">Grupos</h3>
            <!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('instructor.groups') }}" class="form-inline justify-content-center">
                <div class="container1">
                    <input type="text" class="form-control mr-sm-2" name="search" placeholder="Buscar grupo" value="{{ request()->search }}">
                    <div class="textBuscar">
                        <button class="buscar" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="fichas">
        <div class="container2">

            {{-- route('instructor.group', ['group_id' => $group->id]) --}} 

                    @foreach($groups as $group)
                        
                        <div class="card">
                            <a href="{{ route('instructor.group', ['group_id' => $group->id]) }}">
                                <div class="card-header">
                                    <img class="product-image" src="{{url('images/logo-sena2.svg')}}" alt="">
                                </div>
                                <div class="card-body">
                                    {{ $group->program->name }}
                                </div>
                                <div class="user">
                                    <div class="user-info">Ficha {{ $group->number }}</div> 
                                </div>
                            </a>
                            
                        </div>
                    @endforeach

        </div>
    </div>
    <div class="pasarDePagina" >
        {{ $groups->links() }}
    </div>
    
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 @if (session('success'))
    Swal.fire(
        '¡Excelente!',
        '{{ session('success') }}',
        'success'
    )
@endif
</script>
@endsection