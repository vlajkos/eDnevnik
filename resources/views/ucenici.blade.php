@extends('layouts.app')

@section('content')


<h1>Ucenici</h1>
@foreach ($ucenici as $ucenik)
@php
$ucenikId = $ucenik->id;

$odeljenjeId = $odeljenje->id;
@endphp
<a href="{{ route('ucenik.show.profesor', ['ucenik' => $ucenikId, 'odeljenje' => $odeljenjeId, ]) }}"> {{ ucfirst($ucenik->ime) }} {{ucfirst($ucenik->prezime)}}</a>
<br>

@endforeach


@endsection