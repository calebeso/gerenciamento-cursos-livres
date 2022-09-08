<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';

    protected $fillable = [
        'nome',
        'serie',
        'idioma'
    ];

    public function licoes(){
        return $this->hasMany(Licao::class, 'livro_id', 'id');
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'livro_aluno', 'livro_id', 'aluno_id');
    }

    public function horasAula()
    {
        return $this->hasMany(HoraAula::class);
    }
    public function turmas(){
        return $this->hasMany(Turma::class,'turma_id','id');
    }
}
