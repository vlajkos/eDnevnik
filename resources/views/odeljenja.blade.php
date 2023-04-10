@extends('layouts.app')

@section('content')

@foreach($odeljenja as $odeljenje)


<a href="{{ route('odeljenje.show', ['odeljenje' => $odeljenje]) }}">
    @php
    echo $odeljenje->naziv;
    @endphp
</a>
<br>
@endforeach




@endsection