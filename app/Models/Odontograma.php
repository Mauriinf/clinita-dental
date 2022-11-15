<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Odontograma extends Model
{
    use HasFactory;
    protected $table='odontograma';
    public static function save_info($id_consulta,$id_tratamiento,$numeroDiente,$parteDiente,$obsevacion){
        $query=DB::select ("INSERT INTO odontograma (id_consulta,id_tratamiento, id_diente, parte_diente, observacion)
        VALUES ('$id_consulta', '$id_tratamiento', '$numeroDiente', '$parteDiente', '$obsevacion') ");
        return $query;
    }
    public static function delete_odontograma($id){
        $query=DB::select ("DELETE FROM odontograma where id='$id' ");
        return $query;

    }
}
