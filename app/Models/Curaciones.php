<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Curaciones extends Model
{
    use HasFactory;
    protected $table='consultas';
    protected $fillable = [
        'id_cliente',
        'id_doctor',
        'motivo',
        'diagnostico',
        'medicamentos',
        'fecha_creacion',
        'fecha_inicio',
        'fecha_final',
        'alergias',
        'enfermedades',
        'estado',
        'otros',
        'costo_total'
    ];
    public static function consultas(){
        $consulta="SELECT CONCAT(IFNULL(CONCAT(us.nombres, ' '), ''),IFNULL(CONCAT(us.paterno, ' '), ''),IFNULL(CONCAT(us.materno, ' '), '')) as nombre_paciente,us.id as id_paciente,us.ci as ci_paciente,us.nombres as nom_paciente,us.paterno as pat_paciente,us.materno as mat_paciente,doc.ci as ci_doctor,CONCAT(IFNULL(CONCAT(doc.nombres, ' '), ''),IFNULL(CONCAT(doc.paterno, ' '), ''),IFNULL(CONCAT(doc.materno, ' '), '')) as nombre_doctor ,co.*, ( SELECT SUM(od.pago) from odontograma od where od.id_consulta=co.id) as total_pagado
        FROM consultas co INNER JOIN users us
                    ON us.id=co.id_cliente
                    INNER JOIN users doc
                    ON doc.id=co.id_doctor ";
        $user= Auth::user();
        $where='';
        if($user->hasRole('Doctor')){
            $where.=" WHERE doc.id='$user->id'";
        }elseif($user->hasRole('Paciente')){
            $where.=" WHERE us.id='$user->id'";
        }
        $query=DB::select ($consulta.$where);
        return $query;
    }
    public static function cobros_entre_fechas($inicio,$fin){
        $query=DB::select ("SELECT CONCAT(IFNULL(CONCAT(us.nombres, ' '), ''),IFNULL(CONCAT(us.paterno, ' '), ''),IFNULL(CONCAT(us.materno, ' '), '')) as nombre_paciente,
                        us.ci as ci_paciente,us.sexo,us.fec_nac,co.diagnostico,us.nombres as nom_paciente,us.paterno as pat_paciente,us.materno as mat_paciente,doc.ci as ci_doctor,
                        CONCAT(IFNULL(CONCAT(doc.nombres, ' '), ''),IFNULL(CONCAT(doc.paterno, ' '), ''),IFNULL(CONCAT(doc.materno, ' '), '')) as nombre_doctor ,
                        co.costo_total, ( SELECT SUM(od.pago) from odontograma od where od.id_consulta=co.id AND od.fecha>='$inicio'
                        AND od.fecha<='$fin') as total_pagado
                                                FROM consultas co INNER JOIN users us
                                                            ON us.id=co.id_cliente
                                                            INNER JOIN users doc
                                                            ON doc.id=co.id_doctor");
        return $query;
    }
    public static function atendidos_entre_fechas($inicio,$fin){
        $query=DB::select ("SELECT DISTINCT us.ci as ci_paciente, CONCAT(IFNULL(CONCAT(us.nombres, ' '), ''),IFNULL(CONCAT(us.paterno, ' '), ''),IFNULL(CONCAT(us.materno, ' '), '')) as nombre_paciente
        FROM consultas co INNER JOIN users us
                    ON us.id=co.id_cliente
                    WHERE co.fecha_creacion>='$inicio'
                    AND co.fecha_creacion<='$fin'");
        return $query;
    }
}
