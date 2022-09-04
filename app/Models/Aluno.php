<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'matricula',
        'status',
        'telefone',
        'rg',
        'cpf'
    ];

    protected function dataNascimento() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d/m/Y', strtotime($value)),
            set: fn ($value) => Carbon::createFromFormat('d/m/Y', $value),
        );
    }

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
        return $this->belongsToMany(Turma::class,'turma_aluno');
    }

    public function horasAula()
    {
        return $this->belongsTo(HoraAula::class);
    }
}
