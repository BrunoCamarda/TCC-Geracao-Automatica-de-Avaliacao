<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Questao;

class Assunto extends Model
{
    protected $table = 'assunto';
    protected $fillable = [
        'id', 'nome'];


    public function questoes(){
        return $this->belongsToMany('Questao');
    }    
}
