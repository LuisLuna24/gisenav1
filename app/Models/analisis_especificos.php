<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisis_especificos extends Model
{
    protected $table = 'catalogo_analisis_especifico';
    protected $primaryKey = 'id_analisis_especifico';
    protected $fillable = [
        'nombre_analisis_especifico',
        'descripcion',
        'id_tipo_analisis',
        'clave_analisis',
        'nombre_tecnico',
        'referencia_normativa',
        'aprobacion',
        'autorizacion',
        'precio'
    ];

    //^==============================================Relaciones
    public function catalogo_tipo_analisis(){
        return $this->belongsTo(tipo_analises::class, 'id_tipo_analisis', 'id_tipo_analisis'); 
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);  // relacion muchos a muchos
    }
    use HasFactory;
}
