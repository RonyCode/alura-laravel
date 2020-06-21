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
        $serie = Serie::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 1; $j <= $request->ep_por_temporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        $request
            ->session()
            ->flash(
                'mensagem',
                "Série: {$serie->id} titulo: {$serie->nome} e suas temporadas e episódios criada com sucesso!"
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
