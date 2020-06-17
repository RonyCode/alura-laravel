<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $nome = $request->nome;
        $serie = Serie::create(['nome' => $nome]);
        $request
            ->session()
            ->flash(
                'mensagem',
                "Série{$serie->id} criada com sucesso {$serie->nome}"
            );
        return \redirect('/series');
    }
}
