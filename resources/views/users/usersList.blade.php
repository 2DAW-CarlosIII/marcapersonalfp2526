@extends('dopetrope.master')

@section('menu')
    @parent
    <li>Opción adicional</li>
@endsection

@section('content')
    <ul>
        @foreach ($users as $user)
            <li>Usuario {{ $user['name'] }} con identificador: {{ $user ['id'] }}</li>
        @endforeach
    </ul>
@endsection


