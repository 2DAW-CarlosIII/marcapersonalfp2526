
@extends('dopetrope.master')

@section('menu')
    @parent
    <p>¡Hola {{ isset($nombre) ? $nombre : 'colega' }}!</p>
@endsection

@section('content')
    <p>La hora actual es {{now()}}</p>

    <p>
        @if( count($users) === 1 )
            Solo hay un usuario!
        @elseif (count($users) > 1)
            Hay muchos usuarios!
            <ul>
                @include('users.usersList', ['users' => $users])
            </ul>
        @else
            No hay ningún usuario :(
        @endif
    </p>
@endsection


