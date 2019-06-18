<?php

namespace App;
use App\Questao;
use App\AvaliacaoQuestao; 
use Carbon\Carbon; 

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model{
    public $table = "avaliacao";
    
    public function questoes(){
        return $this->belongsToMany('Questao');
    } 

    public function adicionaQuestao(Questao $questao, $tipo){
        $idAvaliacao = $this->id; 
        $avaliacao = new AvaliacaoQuestao;
        $avaliacao->id_avaliacao = $idAvaliacao;
        $avaliacao->id_questao = $questao->id; 
        $avaliacao->save();  
        $questao->last_used = Carbon::now();
        $questao->tipoAvaliacao = $tipo;
        $questao->save();
    }

}
