<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function historia_clinica(){
        $data[] = ['1'];
        $pdf = PDF::loadView('reportes.historia_clinica', $data);
        return $pdf->stream('invoice.pdf');
    }
}
