@extends('layout')

@section('header')
Minhas Series Favoritas
@endsection

@section('body')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a name="adiciona" id="adiciona" class="btn btn-primary mb-2" href="/series/adicionar" role="button">Adicionar</a>

<ul class="list-group ">

    @foreach ($series as $serie)
    <li class="list-group-item">{{$serie->nome}}

        <form action="/series/{{$serie->id}}" method="post"
            onsubmit="return confirm('Tem certeza que deseja remover{{addslashes ($serie->nome)}} ?')">

            @csrf
            @method('DELETE')
            <button class="btn btn-danger float-right">Excluir</button>
        </form>
    </li>

    @endforeach
</ul>
@endsection
