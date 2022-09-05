<?php

namespace App\Http\Controllers\HoraAula;

use App\Http\Controllers\Controller;
use App\Models\DiarioAula;
use App\Models\Turma;
use Illuminate\Http\Request;

class HoraAulaController extends Controller
{
    public function show($id, $diario){

        $turma = Turma::findOrFail($id);
        $diario = DiarioAula::findOrFail($diario);

        return view('diarios.show', compact('diario', 'turma'));
    }
}
