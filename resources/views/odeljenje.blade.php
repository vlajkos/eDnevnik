@extends('layouts.app')

@section('content')


<h1>Ucenici</h1>
@foreach ($ucenici as $ucenik)
@php
$ucenikId = $ucenik->id;

$odeljenjeId = $odeljenje->id;
@endphp
<a href="{{ route('ucenik.show', ['ucenik' => $ucenikId]) }}"> {{ ucfirst($ucenik->ime) }} {{ucfirst($ucenik->prezime)}}</a>
<br>

@endforeach
<a href="{{ route('ucenik.store.show') }}">Dodaj učenika</a>

@endsection