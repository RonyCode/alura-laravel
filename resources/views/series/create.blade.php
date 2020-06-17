@extends('layout')

@section('header')
Adicionar Serie
@endsection

@section('body')


        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">

            </div>
            <button  class="btn btn-primary">Adicionar</button>
        </form>
@endsection
