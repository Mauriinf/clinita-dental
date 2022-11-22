<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function historia_clinica(Request $request){
        $usuario = User::find($request->id_paciente);
        dd($usuario);
        $pdf = PDF::loadView('reportes.historia_clinica');
        return $pdf->stream('invoice.pdf', $usuario);
    }
}
