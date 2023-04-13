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

            <th>Obriši
            </th>

        </tr>
    </thead>
    <tbody>
        @php $profesori = $odeljenje->profesori @endphp
        @foreach ($mojiPredmeti as $predmet)
        @php $ukupno = 0; $i=0; @endphp
        <tr>

            <td>@php echo $predmet->ime_predmeta @endphp</td>



            <td>@foreach ($profesori as $profesor) @if($profesor->id_predmet == $predmet->id)
                @php echo ucfirst($profesor->ime) . " " . ucfirst($profesor->prezime);
                $id_odeljenje = $odeljenje->id;
                $id_profesor = $profesor->id;
                $id_predmet = $predmet->id;
                @endphp
            </td>
            <td>
                <form action="{{ route('predmet.delete')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Briši</button>
                    <input value='@php echo $id_odeljenje @endphp' name='id_odeljenje' type="hidden">
                    <input value='@php echo $id_profesor @endphp' name='id_profesor' type="hidden">
                    <input value='@php echo $id_predmet @endphp' name='id_predmet' type="hidden">
                </form>

            </td>
            @endif
            @endforeach


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