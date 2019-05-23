<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public static function makePDF($questoes){
        return view('avaliacao.pdf')->with("questoes", $questoes);
    }
}
