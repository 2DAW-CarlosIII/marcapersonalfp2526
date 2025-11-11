@extends('dopetrope.master')

@section('menu')
    @parent
    <p>¡Hola {{$nombre ?? 'colega'}}!</p>
@endsection

@section('content')
     <p>{{now()}}</p>


        @if( count($users) === 1 )
    <p>Solo hay un usuario!</p>
@elseif (count($users) > 1)
   <p> Hay muchos usuarios!</p>
   @include('users.userlist', ['name' => $users])
@else
 <p>No hay ningún usuario :(</p>
@endif
       <ul>
        @include('users.userlist', ['users' => $users])
       </ul>

@endsection
