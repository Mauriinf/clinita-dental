<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\BloqueDia;
use App\Models\Dia;
use Illuminate\Http\Request;

class BloqueDiaController extends Controller
{
    public function index()
    {
        $bloque_dia = (object)BloqueDia::get_agenda();

        $dias = Dia::all();
        $bloques = Bloque::all();

        return view('admin.bloque_dia.index', compact('bloque_dia', 'dias', 'bloques'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
