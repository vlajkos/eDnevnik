@extends('layouts.app')

@section('content')


<h1><?php
    echo "Zdravo " . $loggedUser->ime . " " . $loggedUser->prezime;
    ?>
</h1>
<a href="{{ route('odeljenja')}}">Odeljenja - profesor</a>
<br>
<a href="{{ route('odeljenje')}}">Odeljenje - razredni</a>





@endsection