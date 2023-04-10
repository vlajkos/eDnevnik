@extends('layouts.app')

@section('content')


<h2> @php
    echo ucfirst($ucenik->ime) . ' ' . ucfirst($ucenik->prezime);
    @endphp </h2>


<h3>@php echo" Odeljenje: " . $odeljenje->naziv @endphp</h3>
<table class="table">
    <thead>
        <tr>
            <th>Predmet
            </th>


            <th>Ocene
            </th>

            <th>Prosek
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($predmeti as $predmet)
        @php $ukupno = 0; $i=0; @endphp
        <tr>
            <td>@php echo $predmet->ime_predmeta @endphp</td>

            <td>@foreach ($ocene as $ocena)@php if($ocena->id_predmet == $predmet->id) {
                $i++;
                $ukupno += $ocena->vrednost;
                echo $ocena->vrednost; }@endphp
                @endforeach</td>
            <td>@php $prosek = number_format($ukupno/$i, 2); echo $prosek; @endphp </td>

        </tr>

        @endforeach
    </tbody>

</table>






@endsection