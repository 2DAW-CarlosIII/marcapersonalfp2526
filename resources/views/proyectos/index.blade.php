@extends('layouts.master')

@section('content')

    <div class="row">

    @foreach($proyectos as $proyecto)

        <a href="{{ url('proyectos/show/' . $proyecto->id) }}">
            {{ $proyecto->nombre }}
        </a>
    @endforeach


</div>

@stop
