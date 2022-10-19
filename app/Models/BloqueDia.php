<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BloqueDia extends Model
{
    use HasFactory;

    protected $table = 'bloque_dia';
    protected $fillable = [
        'id_usuario', 'estado', 'id_dia', 'id_bloque'
    ];

    public static function get_agenda(){
        $resultados = DB::select(
            DB::raw("
                SELECT u.paterno || ' ' || u.materno || ', ' || u.nombres as usuario, d.nombre_dia, b.inicio, b.fin, bdia.estado
                  FROM bloque_dia bdia
            INNER JOIN users u
                    ON bdia.id_usuario = u.id
            INNER JOIN dia d
                    ON bdia.id_dia = d.id
            INNER JOIN bloque b
                    ON bdia.id_bloque = b.id
            ORDER BY b.inicio ASC
        "));
        return $resultados;
    }
}
