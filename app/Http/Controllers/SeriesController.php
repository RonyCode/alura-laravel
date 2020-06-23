<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use App\Temporada;

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

    public function store(
        SeriesFormRequest $request,
        CriadorDeSeries $criadorDeSeries
    ) {
        $serie = $criadorDeSeries->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );
        $request
            ->session()
            ->flash(
                'mensagem',
                "Série: {$serie->id} titulo: {$serie->nome} e suas temporadas e episódios criada com sucesso!"
            );
        return \redirect()->route('listar_cursos');
    }
    public function destroy(
        Request $request,
        RemovedorDeSeries $removedorDeSeries
    ) {
        $nomeSerie = $removedorDeSeries->removeSerie($request->id);

        $request
            ->session()
            ->flash('mensagem', "Serie $nomeSerie foi removida com sucesso!");
        return \redirect()->route('listar_cursos');
    }
}
