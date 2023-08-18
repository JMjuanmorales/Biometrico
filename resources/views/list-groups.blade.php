@extends('layouts.admin')

@section('content')

<div class="container">
    <!--<a class="regresar" href="" >
        {{ __('Regresar') }}
    </a>-->
    
    <div class="p-5">

        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <h3 class="textGrupos">Grupos</h3>
            <!-- Formulario de búsqueda -->
            <form method="GET" action="{{ route('admin.list-groups') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Buscar grupo por número" value="{{ request()->search }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
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
                            <a href="#">
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
@endsection