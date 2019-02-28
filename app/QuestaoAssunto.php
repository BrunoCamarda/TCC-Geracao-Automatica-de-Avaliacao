<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestaoAssunto extends Model
{
    protected $table = 'questao_assunto';
    protected $fillable = [
        'id_questao', 'id_assunto'];
}
