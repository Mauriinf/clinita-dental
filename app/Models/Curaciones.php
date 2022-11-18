<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        $query=DB::select ("SELECT us.id as id_paciente,us.ci as ci_paciente,us.nombres as nom_paciente,us.paterno as pat_paciente,us.materno as mat_paciente,CONCAT(us.nombres,' ',us.paterno,' ',us.materno) as nombre_paciente,doc.ci as ci_doctor,CONCAT(doc.nombres,' ',doc.paterno,' ',doc.materno) as nombre_doctor ,co.*, ( SELECT SUM(od.pago) from odontograma od where od.id_consulta=co.id) as total_pagado FROM consultas co INNER JOIN users us
                        ON us.id=co.id_cliente
                        INNER JOIN users doc
                        ON doc.id=co.id_doctor");
        return $query;
    }
}
