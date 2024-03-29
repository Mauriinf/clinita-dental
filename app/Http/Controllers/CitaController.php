<?php

namespace App\Http\Controllers;

use App\Models\BloqueDia;
use App\Models\Especialidad;
use App\Models\User;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:lista-cita|crear-cita|editar-cita|eliminar-cita', ['only' => ['index','store']]);
         $this->middleware('permission:crear-cita', ['only' => ['create','store']]);
         $this->middleware('permission:editar-cita', ['only' => ['estado']]);
         $this->middleware('permission:editar-cita', ['only' => ['edit','update']]);
         $this->middleware('permission:eliminar-cita', ['only' => ['destroy']]);
    }
    public function index()
    {
        $user= Auth::user();
        $citas_pendientes = Cita::lista_citas('RESERVADO');
        $citas_confirmadas = Cita::lista_citas( 'CONFIRMADO');
        $citas_anteriores = Cita::lista_citas( 'ANTERIORES');//ATENDIDO CANCELADO

        return view('citas.index',
            compact(
                'citas_pendientes', 'citas_confirmadas', 'citas_anteriores'
            )
        );
    }
    public function estado(Cita $citas,Request $Request){
        $citas->estado=$Request->input('estado');
        $citas->save();
        return redirect('/citas');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::select()->where('estado','=','1')->get();

        $pacientes = DB::table('users')
                    ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                    ->join('roles','model_has_roles.role_id','=','roles.id')
                    ->select(
                        'users.id',
                        'users.nombres',
                        'users.paterno',
                        'users.materno',
                        'users.ci',
                        'users.username',
                        'users.email',
                        'users.telefono',
                        'users.direccion',
                        'users.fec_nac',
                        'users.estado'
                        )
                    ->where('roles.name','<>','Admin')
                    ->where('roles.name','<>','Asistente')
                    ->where('roles.name','<>','Doctor')
                    ->where('users.estado','=','1')
                    ->get();
        //, compact('specialties', 'doctors', 'intervals','pacientes','role')
        return view('citas.create', compact('especialidades', 'pacientes'));
    }
    public function horas(Request $request){
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:users,id',
        ];
        $mensajes=[
            'date.required' => 'Seleccione una fecha',
        ];
        $validator = Validator::make($request->all(),$rules,$mensajes );
        $respuesta=Array();
        if(!$validator->fails()){
            $date = $request->input('date');
            $doctorId = $request->input('doctor_id');
            $horas=Cita::horas_doctor($date, $doctorId);
           // $dayofweek = date('N', strtotime($date));
            if(count($horas)>0){
                return response()->json(['OK'=>$horas]);
            }else{
                return response()->json(['NoHoras'=>'No existen horas']);
            }

        }else{
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/La_Paz');
        $user= Auth::user();
        if ($user->hasRole('Admin')) {
            $rules=[
                'descripcion'=>'required',
                'especialidad'=>'exists:especialidades,id',
                'doctor'=>'exists:users,id',
                'paciente'=>'exists:users,id',
                'id_bloque'=>'required',
            ];
        }else{
            $rules=[
                'descripcion'=>'required',
                'especialidad'=>'exists:especialidades,id',
                'doctor'=>'exists:users,id',
                'id_bloque'=>'required',
            ];
        }
        $messages = ['id_bloque.required' => 'Por favor seleccione una hora válida para su cita'];
        $validator = Validator::make($request->all(),$rules,$messages );
        $respuesta=Array();
        if(!$validator->fails()){
            $fecha=$request->input('fecha_cita');
            $doctorId=$request->input('doctor');
            $id_bloque=$request->input('id_bloque');
            $hora=$request->input('hora');
            $query=Cita::verificar_reserva($fecha, $id_bloque);//verificar si el bloque esta disponible
            if(count($query)>0){
                $validator->errors()->add('id_bloque', 'La hora seleccionada ya se encuentra reservada por otro paciente.');
                return back()->withErrors($validator)->withInput();
            }else{
                $date_cita = date('d/m/Y H:i:s', strtotime("$fecha $hora"));
                $date_actual = date('d/m/Y H:i:s', time());
                $fecha_hoy= date('Y-m-d');
                $hora_hoy= date('H:i:s');
                $hora_select= date('H:i:s', strtotime("$hora"));
                if($fecha<$fecha_hoy && $hora_select<$hora_hoy){
                    $validator->errors()->add('id_bloque', 'La fecha y hora seleccionada no debe ser menor a la fecha actual.');
                    return back()->withErrors($validator)->withInput();
                }else{
                    if ($user->hasRole('Admin')) {
                        $paciente_id = $request->input('paciente');
                     }else{
                        $paciente_id = Auth::user()->id;
                     }
                     $cita = Cita::create([
                         'descripcion'    => $request->input('descripcion'),
                         'id_especialidad'=> $request->input('especialidad'),
                         'id_usuario'     => $paciente_id,
                         'fecha'          => $request->input('fecha_cita'),
                         'estado'         => 'CONFIRMADO',
                         'id_bloque_dia'  => $request->input('id_bloque')
                     ]);
                     $notificacion='La cita se ha registrado Correctamente';
                     return redirect('/citas')->with(compact('notificacion'));
                }
            }
        }else{
            //return response()->json(['errors'=>$validator->errors()->all()]);
            return back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resul= Cita::detalle_cita($id);
        abort_if(!count($resul)>0, 403);
        $detalle=$resul[0];
        return view('citas.show',compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        $especialidades = Especialidad::select()->where('estado','=','1')->get();

        $pacientes = DB::table('users')
                    ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                    ->join('roles','model_has_roles.role_id','=','roles.id')
                    ->select(
                        'users.id',
                        'users.nombres',
                        'users.paterno',
                        'users.materno',
                        'users.ci',
                        'users.username',
                        'users.email',
                        'users.telefono',
                        'users.direccion',
                        'users.fec_nac',
                        'users.estado'
                        )
                    ->where('roles.name','<>','Admin')
                    ->where('roles.name','<>','Asistente')
                    ->where('roles.name','<>','Doctor')
                    ->where('users.estado','=','1')
                    ->get();
        $bloque = DB::table('bloque_dia')
                    ->join('bloque','bloque_dia.id_bloque','=','bloque.id')
                    ->select(
                        'bloque_dia.id',
                        'bloque.inicio',
                        'bloque.fin'
                        )
                    ->where('bloque_dia.id','=',$cita->id_bloque_dia)
                    ->get();
        $bloque=$bloque[0];
        return view('citas.edit',compact('cita','especialidades','pacientes','bloque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        date_default_timezone_set('America/La_Paz');
        $user= Auth::user();
        if ($user->hasRole('Admin')) {
            $rules=[
                'id'=>'required',
                'descripcion'=>'required',
                'especialidad'=>'exists:especialidades,id',
                'doctor'=>'exists:users,id',
                'paciente'=>'exists:users,id',
                'id_bloque'=>'required',
            ];
        }else{
            $rules=[
                'id'=>'required',
                'descripcion'=>'required',
                'especialidad'=>'exists:especialidades,id',
                'doctor'=>'exists:users,id',
                'id_bloque'=>'required',
            ];
        }
        $messages = ['id_bloque.required' => 'Por favor seleccione una hora válida para su cita'];
        $validator = Validator::make($request->all(),$rules,$messages );
        $respuesta=Array();
        if(!$validator->fails()){
            $id=$request->input('id');
            $fecha=$request->input('fecha_cita');
            $doctorId=$request->input('doctor');
            $id_bloque=$request->input('id_bloque');
            $hora=$request->input('hora');
            $query=Cita::verificar_reserva($fecha, $id_bloque);//verificar si el bloque esta disponible
            if(count($query)>0){
                $validator->errors()->add('id_bloque', 'La hora seleccionada ya se encuentra reservada por otro paciente.');
                return back()->withErrors($validator)->withInput();
            }else{
                $date_cita = date('d/m/Y H:i:s', strtotime("$fecha $hora"));
                $date_actual = date('d/m/Y H:i:s', time());
                $fecha_hoy= date('Y-m-d');
                $hora_hoy= date('H:i:s');
                $hora_select= date('H:i:s', strtotime("$hora"));
                if($fecha<$fecha_hoy && $hora_select<$hora_hoy){
                    $validator->errors()->add('id_bloque', 'La fecha y hora seleccionada no debe ser menor a la fecha actual.');
                    return back()->withErrors($validator)->withInput();
                }else{
                    if ($user->hasRole('Admin')) {
                        $paciente_id = $request->input('paciente');
                     }else{
                        $paciente_id = Auth::user()->id;
                     }
                     $cita = Cita::find($id);
                     $cita->descripcion=$request->input('descripcion');
                     $cita->id_especialidad=$request->input('especialidad');
                     $cita->id_usuario=$paciente_id;
                     $cita->fecha=$request->input('fecha_cita');
                     $cita->estado='CONFIRMADO';
                     $cita->id_bloque_dia=$request->input('id_bloque');
                     $cita->save();
                     $notificacion='La cita se ha modificado Correctamente';
                     return redirect('/citas')->with(compact('notificacion'));
                }
            }
        }else{
            //return response()->json(['errors'=>$validator->errors()->all()]);
            return back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);

        $cita->delete();
    }
}
