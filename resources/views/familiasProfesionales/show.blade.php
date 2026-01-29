@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            @if ($familiaProfesional->imagen)
    <img width="300" style="height:300px" src="{{ Storage::url($familiaProfesional->imagen) }}" alt="imagen" class="img-thumbnail">
@else
        <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
@endif

        </div>
        <div class="col-sm-8">

            <h2><b>Nombre: </b>{{ $familiaProfesional->nombre }}</h2>
            <h4><b>Codigo: </b>{{ $familiaProfesional->codigo }}</h4>
@auth
            <a href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getEdit'], ['id'=>$familiaProfesional->id]) }}"
                class="button primary"> Editar

            </a>
@endauth
            <a href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getIndex']) }}"
                class="button primary"> Listado familias profesionales

            </a>


        </div>
    </div>
@endsection
