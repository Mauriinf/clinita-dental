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
    // function __construct()
    // {
    //      $this->middleware('permission:lista-curacion|crear-curacion|editar-curacion|eliminar-curacion', ['only' => ['index','guardar_consulta']]);
    //      $this->middleware('permission:crear-curacion', ['only' => ['nuevo','guardar_consulta']]);
    //      $this->middleware('permission:editar-curacion', ['only' => ['editar_consulta']]);

    // }
    public function index()
    {
        
        $consultas=Curaciones::consultas();
        dd($consultas);
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
                'estado' => 'PROCESO',
                'costo_total' => $request->costo
            ]);
            array_push($respuesta,'OK');
            return ($respuesta);
        }else{
            return response()->json(['error'=>$validator->errors()]);
            //return response()->json($validator->errors()->all());
        }

    }
    public function editar_consulta(Request $request){
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
            $curaciones = Curaciones::find($request->id_consulta);
            $curaciones->id_cliente = $request->id_paciente;
            $curaciones->id_doctor = Auth::user()->id;
            $curaciones->diagnostico = $request->diagnostico;
            $curaciones->medicamentos = $request->medicamentos;
            $curaciones->fecha_inicio = $request->f_inicio;
            $curaciones->fecha_final = $request->f_fin;
            $curaciones->alergias = $request->alergias;
            $curaciones->enfermedades = $request->enfermedades;
            $curaciones->estado = $request->estado;
            $curaciones->costo_total = $request->costo;
            $curaciones->save();

            array_push($respuesta,'OK');
            return ($respuesta);
        }else{
            return response()->json(['error'=>$validator->errors()]);
            //return response()->json($validator->errors()->all());
        }

    }
}
