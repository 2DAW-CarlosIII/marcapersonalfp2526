@extends('dopetrope.master')


@section('content')
    <ul>
        @foreach ($users as $user)
            <li>Usuario {{ $user['name'] }} con identificador: {{ $user ['id'] }}</li>
        @endforeach
    </ul>
@endsection



