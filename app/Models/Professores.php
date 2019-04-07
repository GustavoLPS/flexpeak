<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    protected $primaryKey = 'id_professores';

    protected $fillable = [
    	'nome_professores',
    	'data_nascimento_professores'
    ];
}
