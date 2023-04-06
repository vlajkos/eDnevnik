@extends('layouts.app')

@section('content')


<h1>Početna</h1>
<?php
echo "Zdravo " . $loggedUser->ime . " " . $loggedUser->prezime;
?>

@endsection