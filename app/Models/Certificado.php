<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");
    }

    public function scopeNombreArchivo($query, $nombreArchivo)
    {
        if($nombreArchivo)
            return $query->orWhere('nombre_archivo', 'LIKE', "%$nombreArchivo%");
    }
}
