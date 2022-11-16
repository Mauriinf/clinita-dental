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
        $query=DB::select ("SELECT us.ci as ci_paciente,(us.nombres || ' ' || us.paterno || ' ' || us.materno) as nombre_paciente,doc.ci as ci_doctor,(doc.nombres||' '||doc.paterno||' '||doc.materno) as nombre_doctor ,co.* FROM consultas co INNER JOIN users us
                            ON us.id=co.id_cliente
                            INNER JOIN users doc
                            ON doc.id=co.id_doctor");
        return $query;
    }
}
