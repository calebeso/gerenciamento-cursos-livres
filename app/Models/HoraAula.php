<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraAula extends Model
{
    use HasFactory;

    protected $table = 'hora_aula';

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
        return $this->belongsTo(DiarioAula::class, 'diario_aula_id', 'id');
    }

    public function alunos(){
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }

    public function livros(){
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }

    public function licoes(){
        return $this->belongsTo(Licao::class, 'licao_id', 'id');
    }
}
