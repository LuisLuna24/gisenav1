<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_analises extends Model
{
    protected $table = 'catalogo_tipo_analisis';
    protected $primaryKey = 'id_tipo_analisis';
    protected $fillable = [
        'nomb_tipo_analisis',
        'id_metodo',
        'id_unidad_metodo',
        'id_tipo_muestra'
    ];

    public function catalogo_tipo_muestra(){
        return $this->belongsTo(tipo_muestras::class, 'id_tipo_muestra', 'id_tipo_muestra');
    }

    public function catalogo_analisis_especifico(){
        return $this->hasMany(analisis_especificos::class);
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);
    }
    use HasFactory;
}
