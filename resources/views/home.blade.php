<!-- COGER COMO PLANTILLA BASE ESTE ARCHIVO. -->
@extends('dopetrope.master')


<!-- SECCIÓN DEL MENÚ PRINCIPAL -->
@section('menu')
    @parent
    <p>¡Hola {{ isset($nombre) ? $nombre : 'colega' }}!</p>
@endsection


<!-- CONTENIDO DE LA PÁGINA -->
@section('content')
    <ul>
    @if (count($users) === 1)
        <li>Solo hay un usuario!</li>
    @elseif (count($users) > 1)
        <li>Hay muchos usuarios!</li>
        @include('users.listaUsuarios', ['users' => $users])
    @else
        <li>No hay ningún usuario :(</li>
    @endif
    </ul>
@endsection
