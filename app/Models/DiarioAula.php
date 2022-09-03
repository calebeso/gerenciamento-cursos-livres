<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiarioAula extends Model
{
    use HasFactory;

    protected $table = 'diario_aula';

    protected $fillable = [
        'data',
        'turma_id'
    ];

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function horasAula()
    {
        return $this->belongsTo(HoraAula::class);
    }
}
