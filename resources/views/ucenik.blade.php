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
        @php $i=0; $ukupno=0; @endphp
        <tr>
            <td>@php echo $predmet->ime_predmeta @endphp</td>
            <td>@foreach ($ocene as $ocena)@php if($ocena->id_predmet == $predmet->id) {
                $i++;
                $ukupno += $ocena->vrednost;
                $id_ocena = $ocena->id;
                @endphp
                <a class="ocena-anchor" href="{{ route('ocena.show', ['ucenik'=>$ucenik, 'ocena' => $id_ocena ]) }}">
                    @php
                    echo $ocena->vrednost; }@endphp
                    @endforeach </a>
            </td>
            <td>@php if ($i != 0) {$prosek = number_format($ukupno/$i, 2); echo $prosek; }
                @endphp </td>

        </tr>

        @endforeach
    </tbody>

</table>





@endsection