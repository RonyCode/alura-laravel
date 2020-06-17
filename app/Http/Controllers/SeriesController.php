<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'Greys Anatomy',
            'Big Bang theory',
            'Spartans',
            'Breaking Bad',
        ];
        return View('series.index', \compact('series'));
    }

    public function create()
    {
        return View('series.create');
    }
}
