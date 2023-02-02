<?php

namespace App\Http\Controllers;

use App\Models\Diente;
use App\Models\Odontograma;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OdontogramaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:odontograma', ['only' => ['odontograma','lista_odontograma']]);
         $this->middleware('permission:crear-odontograma', ['only' => ['guardar_odontograma']]);
         $this->middleware('permission:editar-odontograma', ['only' => ['actualizar_pago']]);
         $this->middleware('permission:eliminar-odontograma', ['only' => ['eliminar_odontograma']]);
    }
    public function odontograma($id){
        $tipos_tratamiento=Tratamiento::select()->where('estado','=','ACTIVO')->get();
        $tratamientos=$tipos_tratamiento;
        //return view('odontograma.odon');
        return view('odontograma.index',compact('tratamientos','id'));
    }
    public function ver_odontograma($id){
        $tipos_tratamiento=Tratamiento::select()->where('estado','=','ACTIVO')->get();
        $tratamientos=$tipos_tratamiento;
        return view('odontograma.ver',compact('tratamientos','id'));
    }
    public function lista_odontograma(Request $request){
        $id_consulta=$request->id_consulta;
        $odo=DB::table('odontograma')
                ->join('tratamientos','odontograma.id_tratamiento','=','tratamientos.id')
                ->join('consultas','odontograma.id_consulta','=','consultas.id')
                ->select(
                    'odontograma.id',
                    'odontograma.id_consulta',
                    'odontograma.id_diente',
                    'odontograma.id_tratamiento',
                    'odontograma.observacion',
                    'odontograma.parte_diente',
                    'tratamientos.descripcion',
                    'tratamientos.costo',
                    'tratamientos.color',
                    'odontograma.pago',
                    'consultas.costo_total'
                )
                ->where('id_consulta','=',$id_consulta)
                ->get();
        $odontogramas=Odontograma::select()->where('id_consulta','=',$id_consulta)->get();
        return $odo;
    }
    public function guardar_odontograma(Request $request){
        $res=Odontograma::save_info($request->id_consulta,$request->id_tratamiento,$request->numeroDiente,$request->parteDiente,$request->obsevacion);
        return $res;
    }
    public function eliminar_odontograma(Request $request){
        $res=Odontograma::delete_odontograma($request->id);
        return $res;
    }
    public function actualizar_pago(Request $request){
        $res=Odontograma::pagos($request->id,$request->pago);
        return $res;
    }
}
