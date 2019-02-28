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
        return $this->belongsToMany('Assunto');
    }        
}
