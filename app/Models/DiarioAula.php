<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiarioAula extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'turma_id'
    ];

    public function turmas(){
        return $this->hasMany(Turma::class);
    }

    public function horasAula()
    {
        return $this->belongsTo(HoraAula::class);
    }
}
