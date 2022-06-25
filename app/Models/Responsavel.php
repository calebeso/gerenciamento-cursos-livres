<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'parentesco',
        'telefone'
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }
}
