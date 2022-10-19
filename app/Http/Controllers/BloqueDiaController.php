<?php

namespace App\Http\Controllers;

use App\Models\BloqueDia;
use Illuminate\Http\Request;

class BloqueDiaController extends Controller
{
    public function index()
    {
        $bloque_dia = BloqueDia::recuperar_agenda();
        return view('admin.bloque_dia.index', compact('bloque_dia'));
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
