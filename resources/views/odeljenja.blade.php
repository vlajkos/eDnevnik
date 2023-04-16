@extends('layouts.app')

@section('content')




<table class="table">

    <thead>
        <tr>
            <th>Odeljenje
            </th>


            <th>Razredni
            </th>


        </tr>

    </thead>

    <tbody>
        @foreach($odeljenja as $odeljenje)
        <tr>
            <td><a class="anchor-wlc" href="{{ route('odeljenje.show', ['odeljenje' => $odeljenje]) }}">
                    @php
                    echo $odeljenje->naziv;
                    @endphp
                </a></td>

            <td>@php echo ucfirst($odeljenje->razredni->ime) . " " . ucfirst($odeljenje->razredni->prezime) @endphp</td>
        </tr>
        @endforeach
    </tbody>

    <br>






    @endsection