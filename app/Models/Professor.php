<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';
    protected $guarded = [];
    protected $dates = ['updated_at', 'created_at'];

    public function curso()
    {
        return $this->hasMany(Curso::class);
    }
}
