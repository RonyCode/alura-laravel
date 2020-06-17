@extends('layout')

@section('header')
Minhas Series Favoritas
@endsection

@section('body')
<a name="adiciona" id="adiciona" class="btn btn-primary mb-2" href="/series/adicionar" role="button">Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item"><?= $serie ?>
    </li>
    @endforeach
</ul>
@endsection
