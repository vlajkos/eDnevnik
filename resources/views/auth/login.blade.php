@extends('layouts.app')

@section('content')
<h1>Log in </h1>

<form method="POST" action="{{ route('profesor.login.store') }}">
    @csrf

    <a href="profesor/login">Profesor login</a>
    <a href="ucenik/login">Ucenik login</a>



</form>
@endsection