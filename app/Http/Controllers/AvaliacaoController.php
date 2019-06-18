<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public static function makePDF(Request $request){
        $pdf = \PDF::loadView('avaliacao.pdfFinal',['questoes' => $request]);
        return $pdf->stream('avaliacao.pdfFinal');
    }
}
