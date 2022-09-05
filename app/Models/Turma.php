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
        return $this->belongsTo(Livro::class,'livro_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');

    }
    //setando relacionamento muitos para muitos
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class,'turma_aluno');
    }

    public function diariosAula()
    {
        return $this->belongsTo(DiarioAula::class);
    }
}
