<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad_medida extends Model
{
    //^==============================================Datos de Tablas
    protected $table = 'unidad_medida';
    protected $primaryKey = 'id_unidad_medida';
    protected $fillable = [
        'nombre_unidad',
    ];

    //^==============================================Relaciones
    public function catalogo_tipo_muestra(){
        return $this->hasMany(tipo_muestras::class, 'id_unidad_medida', 'id_unidad_medida');
    }
    use HasFactory;
}
