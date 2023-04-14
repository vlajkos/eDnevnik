@extends('layouts.app')

@section('content')
<a href="{{ route('ucenik.store.show') }}">Dodaj učenika</a>
<br>
<a href="{{ route('predmet.store.show') }}">Dodaj predmet</a>

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
                <a class="custom-anchor" href="{{ route('ucenik.show', ['ucenik' => $ucenikId]) }}"> {{ ucfirst($ucenik->ime) }} {{ucfirst($ucenik->prezime)}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>





@endsection