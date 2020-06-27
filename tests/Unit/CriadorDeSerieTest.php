<?php

namespace Tests\Unit;

use App\Serie;
use Tests\TestCase;
use App\Services\CriadorDeSeries;

class CriadorDeSerieTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSeries();
        $nomeSerie = 'Nome de teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', [
            'serie_id' => $serieCriada->id,
            'numero' => 1,
        ]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
