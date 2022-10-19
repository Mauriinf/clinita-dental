<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Validator;
class EspecialidadController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:lista-especialidad|crear-especialidad|editar-especialidad|eliminar-especilidad', ['only' => ['index','store']]);
         $this->middleware('permission:crear-especialidad', ['only' => ['create','store']]);
         $this->middleware('permission:editar-especialidad', ['only' => ['edit','store']]);
         $this->middleware('permission:eliminar-especialidad', ['only' => ['destroy']]);
         $this->middleware('permission:asignar-especialidad-usuario', ['only' => ['guardar_especialidad_usuario']]);
    }
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
    public function guardar_especialidad_usuario(Request $request){
        $validator = Validator::make($request->all(), [
            'especialidades' => 'required',
        ]);
        if (!$validator->fails()) {
            $respuesta=Array();
            $user_esp = Especialidad::delete_user_espec($request->usuario);//eliminar especialidades
            foreach($request->especialidades as $row){
                $user = Especialidad::create_user_espec($request->usuario,$row);
            }
            array_push($respuesta,'OK');
            return ($respuesta);
        }else{
            return response()->json($validator->errors()->all());
        }

    }
}
