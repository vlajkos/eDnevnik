@extends('layouts.app')

@section('content')


<h1><?php
    echo "Zdravo " . $loggedUser->ime . " " . $loggedUser->prezime;
    ?>
</h1>
<a class="anchor-wlc" href="{{ route('odeljenja')}}">Odeljenja - profesor</a>
<br>
<a class="anchor-wlc" href="{{ route('odeljenje')}}">Odeljenje - razredni</a>





@endsection