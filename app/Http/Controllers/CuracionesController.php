<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Models\Curaciones;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
class CuracionesController extends Controller
{
    public function index()
    {
        $consultas=Curaciones::consultas();
        return view('curaciones.index',compact('consultas'));
    }
    public function lista_consultas(){
        $consultas=Curaciones::consultas();
        return Datatables::of($consultas)->addColumn('botones', 'actions.consultas')->rawColumns(['botones'])->toJson();
    }
    public function nuevo()
    {
        $tipos_tratamiento=Tratamiento::select()->where('estado','=','ACTIVO')->get();
        $tratamientos=$tipos_tratamiento;
        return view('curaciones.create',compact('tratamientos'));
    }
    public function buscar_paciente(Request $request){
        $usuario = User::where('ci', $request->ci)->first();
        return response()->json($usuario);
    }
    public function guardar_consulta(Request $request){
        $roles=[
            'costo'=>'required',
            'id_paciente'=>'required|numeric',
           ];
           $mensajes=[
            'costo.required'=>'El campo costo es requerido',
            'id_paciente.required'=>'Seleccione a un Paciente',
            'id_paciente.numeric'=>'Seleccione a un Paciente',
           ];
               $validator = Validator::make($request->all(),$roles,$mensajes );

        $respuesta=Array();
        if ($validator->passes()) {
            Curaciones::create([
                'id_cliente'  => $request->id_paciente,
                'id_doctor' => Auth::user()->id,
                'diagnostico' => $request->diagnostico,
                'medicamentos' => $request->medicamentos,
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'fecha_inicio' => $request->f_inicio,
                'fecha_final' => $request->f_fin,
                'alergias' => $request->alergias,
                'enfermedades' => $request->enfermedades,
                'estado' => 'ACTIVO',
                'costo_total' => $request->costo
            ]);
            array_push($respuesta,'OK');
            return ($respuesta);
        }else{
            return response()->json(['error'=>$validator->errors()]);
            //return response()->json($validator->errors()->all());
        }

    }
}
