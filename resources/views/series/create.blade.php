@extends('layout')

@section('header')
Adicionar Serie
@endsection

@section('body')
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">

            </div>
            <button type="button" class="btn btn-primary">Adicionar</button>
        </form>
@endsection
