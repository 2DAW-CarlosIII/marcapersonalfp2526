@extends('layouts.master')


@section('content')
    <p>Vista detalle familia profesional</p>



    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#"><img src="{{ asset('/images/mp-logo.png') }}" alt="Logo Marca Personal FP" width="200px" /></a>

        </div>
        <div class="col-sm-8">

            <p><b>Docente:</b> {{ $proyecto['docente_id'] }}</p>
            <p><b>Nombre:</b> {{ $proyecto['nombre'] }}</p>
            <p><b>Dominio:</b> {{ $proyecto['dominio'] }}</p>
            <p><b>Metadatos:</b></p>
            <ul>
                @foreach ($proyecto['metadatos'] as $indice => $metadato)
                    <li>{{ $indice }}: {{ $metadato }}</li>
                @endforeach
            </ul>

            <p><b>Calificación:</b> {{ $proyecto['metadatos']['calificacion'] }}</p>


            @if ($proyecto['metadatos']['calificacion'] < 5)
                <p>Proyecto suspenso</p>

                <button type="button" class="btn btn-danger">Suspender proyecto</button>
            @else
                <p>Proyecto aprobado</p>

                <button type="button" class="btn btn-primary">Aprobar proyecto</button>
            @endif

            <a class="button alt"
                href="{{ action([App\Http\Controllers\ProyectosController::class, 'getEdit'], ['id' => $id]) }}">
                Editar proyecto
            </a>
            <a class="button alt"
                href="{{ action([App\Http\Controllers\ProyectosController::class, 'getIndex']) }}">
                Volver al listado
            </a>



        </div>
    </div>
@endsection
