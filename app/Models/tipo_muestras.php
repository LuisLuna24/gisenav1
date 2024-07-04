<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_muestras extends Model
{
    protected $table = 'catalogo_tipo_muestra';
    protected $primaryKey = 'id_tipo_muestra';
    protected $fillable = [
        'nom_tipo_muestra',
        'caracteristicas',
        'descripcion',
        'cantidad_requerida',
        'id_subcateria',
        'id_unidad_medida'
    ];

    //^==============================================Relaciones
    public function subcateria(){
        return $this->belongsTo(subcategorias::class, 'id_subcateria', 'id_subcateria');
    }

    public function unidad_medida(){
        return $this->belongsTo(unidad_medida::class, 'id_unidad_medida', 'id_unidad_medida');
    }

    public function descrip_muestra(){
        return $this->hasMany(descrip_muestra::class);
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);
    }
    use HasFactory;
}
