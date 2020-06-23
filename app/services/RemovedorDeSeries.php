<?php

namespace App\Services;

use App\Serie;
use App\Episodio;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSeries
{
    public function removeSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removeTemporada($serie);
            $serie->delete();
        });
        return $nomeSerie;
    }

    public function removeTemporada(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removeEpisodios($temporada);
            $temporada->delete();
        });
    }

    public function removeEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
