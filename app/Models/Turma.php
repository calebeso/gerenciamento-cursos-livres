<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';
    
    protected $fillable = [
        'idioma',
        'modalidade',
        'dias_semana',
        'horario',
        'status',
        'livro_id',
        'user_id'
    ];

    //setando relacionamento
    public function livros(){
        return $this->hasMany(Livro::class);
    }

    //setando relacionamento muitos para muitos
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }

    public function diariosAula()
    {
        return $this->belongsTo(DiarioAula::class);
    }
}
