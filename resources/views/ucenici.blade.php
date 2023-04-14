@extends('layouts.app')

@section('content')


<!-- <h1>Ucenici</h1>
@foreach ($ucenici as $ucenik)
@php
$ucenikId = $ucenik->id;

$odeljenjeId = $odeljenje->id;
@endphp
<a href="{{ route('ucenik.show.profesor', ['ucenik' => $ucenikId, 'odeljenje' => $odeljenjeId, ]) }}"> {{ ucfirst($ucenik->ime) }} {{ucfirst($ucenik->prezime)}}</a>
<br>

@endforeach -->
<h3>Odeljenje: @php echo $odeljenje->naziv. "," @endphp Razredni: @php echo $odeljenje->razredni->ime . " " . $odeljenje->razredni->prezime @endphp</h3>
<h1>Ucenici</h1>

<table class="table">

    <thead>
        <tr>
            <th>Redni Broj
            </th>


            <th>Učenik
            </th>


        </tr>

    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach ($ucenici as $ucenik)
        @php
        $ucenikId = $ucenik->id;

        $odeljenjeId = $odeljenje->id;
        @endphp
        <tr>
            <td>
                @php echo $i; $i++; @endphp
            </td>
            <td>
                <a class="custom-anchor" href="{{ route('ucenik.show.profesor', ['ucenik' => $ucenikId, 'odeljenje'=>$odeljenjeId]) }}"> {{ ucfirst($ucenik->ime) }} {{ucfirst($ucenik->prezime)}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection