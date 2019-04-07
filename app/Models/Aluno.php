<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $primaryKey = 'id_alunos';

 	protected $fillable = [
 		'nome_alunos',
 		'data_nascimento',
 		'logradouro',
 		'numero',
 		'complemento',
 		'bairro',
 		'cidade',
 		'estado',
 		'cep',
 		'id_cursos'

 	];
}
