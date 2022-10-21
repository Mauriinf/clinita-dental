<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cita extends Model
{
    use HasFactory;
    protected $table='citas';
    public static function horas_doctor($date, $doctorId){
        $dayofweek = date('N', strtotime($date));//Obtener el numero del dia de la semana segun una fecha ej: lunes=1,mater=2, etc
        $query=DB::select ("SELECT bd.id as id_bloque_dia, bd.id_usuario,bd.id_dia,bd.id_bloque, bloque.inicio,bloque.fin FROM bloque_dia bd
                            INNER JOIN dia
                            ON dia.id=bd.id_dia
                            INNER JOIN bloque
                            ON bloque.id=bd.id_bloque
                            LEFT JOIN dia_no_disponible dn
                            ON dia.id =dn.id_dia
                            AND dn.fecha='$date'
                            LEFT JOIN bloque_no_disponible bnd
                            ON bloque.id =bnd.id_bloque
                            AND bnd.fecha='$date'
                            WHERE bd.estado='ACTIVO'
                            AND bd.id_usuario='$doctorId'
                            AND bnd.id_bloque IS NULL
                            AND dn.id_dia IS NULL
                            AND bd.id_dia='$dayofweek'");

        return $query;
    }
}
