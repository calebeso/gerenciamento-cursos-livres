<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licao extends Model
{
    use HasFactory;

    protected $table = 'licao';

    protected $fillable = [ 
        'nome',
        'livro_id'
    ];

    public function livros(){
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }

    public function horasAula()
    {
        return $this->hasMany(HoraAula::class);
    }
}
