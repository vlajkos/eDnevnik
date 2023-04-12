@extends('layouts.app')

@section('content')
<script>
    let data = <?php echo json_encode("$profesori", JSON_HEX_TAG); ?>;
</script>
<table class="table">
    <thead>
        <tr>
            <th>Predmet
            </th>


            <th>Profesor
            </th>


        </tr>
    </thead>
    <tbody>
        @php $profesori = $odeljenje->profesori @endphp
        @foreach ($predmeti as $predmet)
        @php $ukupno = 0; $i=0; @endphp
        <tr>
            <td>@php echo $predmet->ime_predmeta @endphp</td>


            <td>@foreach ($profesori as $profesor) @php if($profesor->id_predmet == $predmet->id) {
                echo ucfirst($profesor->ime) . " " . ucfirst($profesor->prezime); }@endphp
                @endforeach</td>


        </tr>

        @endforeach
    </tbody>

</table>

<h3>Dodavanje ili izmena profesora i predmeta</h3>
<form method="POST" action="{{ route('predmet.store') }}">
    @csrf
    <label for=" dodajPredmet">Dodaj predmet</label>
    <select id="dodajPredmet" name="id_predmet">
        <option selected disabled hidden>Izaberi predmet</option>
        @foreach($predmeti as $predmet)
        <option class="option" value='@php echo $predmet->id @endphp'> @php echo $predmet->ime_predmeta @endphp</option>
        @endforeach
    </select>

    <label for="dodajProfesora">Dodaj profesora</label>
    <select id="dodajProfesora" name="id_profesor">
        <option value="" selected disabled hidden>Izaberi profesora</option>

    </select>
    <input type="hidden" id="custId" name="id_odeljenje" value="@php echo $odeljenje->id @endphp">

    <button type=submit>Dodaj</button>

</form>



@endsection