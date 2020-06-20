<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return View('series.index', \compact('series', 'mensagem'));
    }

    public function create()
    {
        return View('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $serie = Serie::create(['nome' => $nome]);
        $request
            ->session()
            ->flash(
                'mensagem',
                "Série: {$serie->id} titulo: {$serie->nome} criada com sucesso!"
            );
        return \redirect()->route('listar_cursos');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Serie removida com sucesso!");
        return \redirect()->route('listar_cursos');
    }
}
