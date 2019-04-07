<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'id_cursos';

    protected $fillable = [
    	'nome_cursos',
    	'id_professores'
    ];
}
