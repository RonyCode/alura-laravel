@extends('layout')

@section('header')

Episódios

@endsection

@section('body')
@include('mensagem', ['mensagem' => $mensagem])
<form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="POST">
    @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodio {{$episodio->numero}}
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistido ? 'checked':''}}>

            @endforeach

        </li>
    </ul>

    <button class="btn btn-primary btn-sm m-2">Salvar</button>
</form>
@endsection
