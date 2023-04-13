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
        @php $i=0; $ukupno=0; @endphp
        <tr>
            <td>@php echo $predmet->ime_predmeta @endphp</td>

            <td>@foreach ($ocene as $ocena)@php if($ocena->id_predmet == $predmet->id) {
                $i++;
                $ukupno += $ocena->vrednost;
                echo $ocena->vrednost; }
                @endphp @endforeach</td>
            <td>@php if ($i !=0) {$prosek = number_format($ukupno/$i, 2); echo $prosek; } @endphp </td>

        </tr>


    </tbody>

    @php
    $ucenikId = $ucenik->id;

    $odeljenjeId = $odeljenje->id;
    @endphp
</table>
<form method="POST" action="{{ route('ocena.store', ['odeljenje' => $odeljenjeId, 'ucenik' => $ucenikId ]) }}" class="dodajOcenuForm">
    @csrf
    <h3>Dodaj ocenu</h3>
    <div class="dodajOcenuDiv"><label for="ocenaInput">Ocena</label>
        <input maxlength="1" id="ocenaInput" type="text" name="vrednost"></input>
    </div>


    <div class="dodajOcenuDiv"><label for="opis">Opis</label>
        <textarea id="opis" name="opis"> </textarea>
    </div>


    <button type="submit">Dodaj</button>
</form>
@endsection