<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = [];
    protected $dates = ['updated_at', 'created_at'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
