@extends('dopetrope.master')


@section('content')
    @foreach ($users as $user)
    <li>Usuario {{ $user['name'] }} con identificador: {{ $user['id'] }}</li>
@endforeach
@endsection


