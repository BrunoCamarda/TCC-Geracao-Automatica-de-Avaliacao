<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Assunto;

class Questao extends Model
{
    protected $table = 'questao';
    protected $fillable = [
        'id', 'tipo', 'dificuldade','tempo', 'enunciado'];

    public function assuntos(){
        return $this->belongsToMany('App\Assunto', 'questao_assunto', 'id_questao', 'id_assunto');
    }
    
    public function avaliacoes(){
        return $this->belongsToMany('App\Avaliacao', 'avaliacao_questao', 'id_questao', 'id_avaliacao');
    }

    public function respostas(){
        return $this->hasOne('App\Resposta'); 
    }

}
