<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resposta; 

class AvaliacaoController extends Controller
{
    public static function makePDF(Request $request){
        $questoes = $request;
        $respostas = Resposta::whereIn('id_questao', $request->questoes)->get();
        $pdf = \PDF::loadView('avaliacao.gabarito', compact('respostas', 'questoes'));
        return $pdf->stream('avaliacao.gabarito');
    }
}
