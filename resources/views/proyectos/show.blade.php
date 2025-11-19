@extends('layouts.master')

@section('content')
    <div class="row m-4">
        <div class="col-sm-4">
            <a href="#"><img src="{{ asset('/images/mp-logo.png') }}" style="height:400px" alt="Imagen de proyecto" /></a>
        </div>
        <div class="col-sm-8">
            <header>
                <h2>{{ $proyecto['nombre'] }}</h2>
            </header>
            <ul>
                <li><b>ID del docente:</b> {{ $proyecto['docente_id'] }}</li>
                <li><a href="http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}">http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}</a></li>
                @foreach ($proyecto['metadatos'] as $key => $metadato)
                    <li><b>{{ $key . ": " }}</b>{{ $metadato }}</li>
                @endforeach
                <li>
                    @if ($proyecto['metadatos']['calificacion'] < 5)
                    <b>Estado:</b> Suspenso
                    <a class="button btn-primary" href="#">Aprobar proyecto</a>
                    @elseif ($proyecto['metadatos']['calificacion'] >= 5)
                    <b>Estado:</b> Aprobado
                    <a class="button btn-danger" href="#">Suspender proyecto</a>
                    @endif
                </li>
            </ul>
            <section>
                <a href="#" class="button alt">Editar Proyecto</a>
                <a href="#" class="button alt">Listar Proyecto</a>
            </section>
        </div>
    </div>
@stop
