<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiarioAula extends Model
{
    use HasFactory;

    protected $table = 'diario_aula';

    protected $fillable = [
        'data',
        'turma_id'
    ];

    protected function data() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d/m/Y', strtotime($value)),
            set: fn ($value) => Carbon::createFromFormat('d/m/Y', $value),
        );
    }

    public function turmas(){
        return $this->belongsTo(Turma::class, 'turma_id', 'id');
    }

    public function horasAula()
    {
        return $this->hasMany(HoraAula::class);
    }
}
