@extends('layouts.app')

@section('content')


<h2> @php
    echo $ucenik->ime . ' ' . $ucenik->prezime;
    @endphp </h2>

<table>
    <thead>
        <tr>
        </tr>
    </thead>
    @foreach ($predmeti as $predmet)
    <h5> @php echo $predmet->ime_predmeta @endphp </h5>
    @endforeach
</table>




@endsection