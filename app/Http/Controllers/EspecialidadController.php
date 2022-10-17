<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Validator;
class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades=Especialidad::all();
        return view('especialidades.index',compact('especialidades'));
    }
    public function estado(Especialidad $especialidad,Request $Request){
        $especialidad->estado=$Request->input('estado');
        $especialidad->save();
        return redirect('/especialidades');
    }
    public function store(Request $Request){
        $roles=[
         'name' => 'required|min:5'
        ];
            $mensajes=[
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.min' => 'El campo nombre debe tener como minimo 5 caracteres',
        ];
            $validator = Validator::make($Request->all(),$roles,$mensajes );

            if ($validator->passes()) {
                if ($Request->input('id')!=0) {
                    $especialidad = Especialidad::find($Request->input('id'));
                    $especialidad->nombre=$Request->input('name');
                    $especialidad->descripcion=$Request->input('description');
                    $especialidad->save();

                }else{
                    $especialidad=new Especialidad();
                    $especialidad->nombre=$Request->input('name');
                    $especialidad->descripcion=$Request->input('description');
                    $especialidad->estado=1;
                    $especialidad->save();
                }


        }

        return response()->json(['error'=>$validator->errors()]);
    }
    public function destroy($id){

        $esp = Especialidad::find($id);

          $esp->delete();
    }
    public function show($id){
        return Especialidad::find($id);
    }
}
