@extends('layouts.app')

@section('content')

<form class="addForm" method="POST" action="{{ route('ucenik.store') }}">
    @csrf
    <label for="ime">Ime</label>
    <input id="ime" name="ime" type="text">
    <br>
    <label for="prezime">Prezime</label>
    <input id="prezime" name="prezime" type="text">
    <br>
    <label for="email">Email</label>
    <input id="email" name="email" type="text">
    <br>
    <label for="lozinka">Lozinka</label>
    <input id="lozinka" name="password" type="text">
    <br>
    <label for="jmbg">Jmbg</label>
    <input id="jmbg" name="jmbg" type="text">
    <br>
    <label for="broj_telefona">Broj Telefona</label>
    <input id="broj_telefona" name="broj_telefona" type="text">
    <br>
    <label for="datum_rodjenja">Datum Rodjenja</label>
    <input type="date" name="datum_rodjenja" id="datum_rodjenja">
    <br>
    <button type="submit">Dodaj</button>


</form>

@endsection