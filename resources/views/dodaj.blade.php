@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('ucenik.store') }}">
    @csrf
    <label for="ime">ime</label>
    <input id="ime" name="ime" type="text">
    <br>
    <label for="prezime">prezime</label>
    <input id="prezime" name="prezime" type="text">
    <br>
    <label for="email">email</label>
    <input id="email" name="email" type="text">
    <br>
    <label for="lozinka">lozinka</label>
    <input id="lozinka" name="password" type="text">
    <br>
    <label for="jmbg">jmbg</label>
    <input id="jmbg" name="jmbg" type="text">
    <br>
    <label for="broj_telefona">broj telefona</label>
    <input id="broj_telefona" name="broj_telefona" type="text">
    <br>
    <label for="datum_rodjenja">Datum rodjenja</label>
    <input type="date" name="datum_rodjenja" id="datum_rodjenja">
    <br>
    <button type="submit">Dodaj</button>


</form>

@endsection