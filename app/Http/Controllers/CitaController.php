<?php

namespace App\Http\Controllers;
use App\Models\Especialidad;
use App\Models\User;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.min' => 'El campo nombre debe tener como minimo 5 caracteres',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
