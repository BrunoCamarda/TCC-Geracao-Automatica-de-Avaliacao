<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoQuestao extends Model
{
    protected $table = 'avaliacao_questao';
    protected $fillable = [
        'id_questao', 'id_avaliacao'];
}
