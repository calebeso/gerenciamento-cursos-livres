<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licao extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'nome',
        'livro_id'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }

    public function horasAula()
    {
        return $this->belongsTo(HoraAula::class);
    }
}
