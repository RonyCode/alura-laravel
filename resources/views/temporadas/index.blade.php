@extends('layout')

@section('header')

Temporadas de {{$serie->nome}}

@endsection

@section('body')

<ul class="list-group ">
    @foreach ($temporadas as $temporada)
    <li class="list-group-item">Temporada {{$temporada->numero}}
    </li>
    @endforeach
</ul>
@endsection
