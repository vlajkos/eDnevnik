@extends('layouts.app')

@section('content')



<h6>Ocena: @php echo $ocena->vrednost @endphp</h6>
<h6>Opis: @php echo $ocena->opis @endphp</h6>
<h6>Profesor: @php echo ucfirst($ocena->profesor->ime) . " " . ucfirst($ocena->profesor->prezime)@endphp</h6>
<h6>Učenik: @php echo ucfirst($ocena->ucenik->ime) . " " . ucfirst($ocena->ucenik->prezime)@endphp</h6>
<h6>Vreme: @php echo $ocena->created_at @endphp</h6>







@endsection