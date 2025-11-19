@extends('layouts.master')

@section('content')

    <div class="row m-4">

    <div class="col-sm-4">

        <img src="/images/mp-logo.png" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <p> Vista detalle proyecto {{$id}} </p>
        <p>{{$proyecto['nombre']}} es el nombre del proyecto</p>
        <p>{{$proyecto['docente_id']}} es el id del docente</p>
        <p>{{$proyecto['dominio']}} es el dominio del proyecto</p>
        <p><strong>Metadatos: </strong>
                <ul>
                    @foreach ($proyecto['metadatos'] as $indice => $metadato)
                        <li>{{ $indice }}: {{ $metadato }}</li>
                    @endforeach
                </ul>
            </p>
        <p>{{$calificacion}}</p>
        @if ($estadoBool)
            <button>Suspender Proyecto</button>
        @else
            <button style="background-color: blue">Aprobar Proyecto</button>
        @endif

        <div >
            <button style="background-color: black !important; margin-top:5px; margin-right:5px"><a href="http://marcapersonalfp.test/proyectos/">Volver al listado</a></button>
            <button style="background-color: black !important"><a href="http://marcapersonalfp.test/proyectos/edit/{{$id}}">Editar proyecto</a></button>
        </div>

    </div>
</div>
@stop

