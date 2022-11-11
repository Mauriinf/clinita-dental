<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Curaciones extends Model
{
    use HasFactory;
    protected $table='consultas';
    public static function consultas(){
        $query=DB::select ("SELECT us.ci as ci_cliente,(us.nombres||' '||us.paterno||' '||us.materno) as nombre_cliente,doc.ci as ci_doctor,(doc.nombres||' '||doc.paterno||' '||doc.materno) as nombre_doctor ,co.* FROM consultas co INNER JOIN users us
                            ON us.id=co.id_cliente
                            INNER JOIN users doc
                            ON doc.id=co.id_doctor");
        return $query;
    }
}
