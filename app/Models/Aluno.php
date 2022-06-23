<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'matricula',
        'status',
        'telefone',
        'rg',
        'cpf'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }

    public function responsaveis()
    {
        return $this->belongsToMany(Responsavel::class);
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }

    public function horasAula()
    {
        return $this->belongsTo(HoraAula::class);
    }
}
