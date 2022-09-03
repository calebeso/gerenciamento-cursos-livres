<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraAula extends Model
{
    use HasFactory;

    protected $fillable = [
        'presenca',
        'tarefa',
        'preparacao',
        'nota_fala',
        'nota_audicao',
        'nota_leitura',
        'nota_escrita',
        'observacoes',
        'diario_aula_id',
        'aluno_id',
        'livro_id',
        'licao_id',
    ];

    public function diariosAula(){
        return $this->hasMany(DiarioAula::class);
    }

    public function alunos(){
        return $this->belongsTo(Aluno::class);
    }

    public function livros(){
        return $this->belongsTo(Livro::class);
    }

    public function licoes(){
        return $this->hasMany(Licao::class);
    }
}
