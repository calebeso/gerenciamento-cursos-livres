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
        'hr_inicio',
        'hr_termino',
        'status',
        'livro_id',
        'user_id'
    ];

    //setando relacionamento
    public function livros(){
        return $this->hasMany(Livro::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
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
