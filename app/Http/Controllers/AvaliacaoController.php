<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resposta; 
use App\AvaliacaoQuestao;
use App\Avaliacao;
use App\Questao;
use Auth;

class AvaliacaoController extends Controller
{
    public static function makePDF(Request $request){
        if (Auth::check()){
            $questoes = $request;
            $respostas = Resposta::whereIn('id_questao', $request->questoes)->get();
            $pdf = \PDF::loadView('avaliacao.gabarito', compact('respostas', 'questoes'));
            return $pdf->stream('avaliacao.gabarito');
        }else{
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>";  
        }
    }

    public function show ($id){
        $avaliacao = Avaliacao::where('id', $id);
        $user = auth()->user();
        if ($user->id == $avaliacao->id_user){
            $questoes = AvaliacaoQuestao::where('id_avaliacao', $id)->get();
            $questao = array();
            foreach($questoes as $q){
                $questao[] = Questao::where('id', $q->id_questao)->get();
            }
            return view('avaliacao.show')->with('questoes', $questao[]);
        }else{ 
            echo"<script type='text/javascript'>alert('Você não tem permissão para acessar essa página!');
            location.href ='/';
        </script>"; 
        }
    }
    
    public function all(){
        $avaliacoes = Avaliacao::all();
        return view('avaliacao.gerenciar')->with('avaliacoes', $avaliacoes);
    }
}
