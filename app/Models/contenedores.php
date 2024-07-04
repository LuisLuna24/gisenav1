<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenedores extends Model
{
    //^==============================================Datos de Tablas
    protected $table = 'contenedor';
    protected $primaryKey = 'idcontenedor';
    protected $fillable = [
        'tipo_contenedor',
        'numero_contenedor',
        'estatus_contenedor',
        'descripcion_estatus',
    ];

    //^==============================================Relacion con otras tablas
    public function recipientes(){
        return $this->hasMany(recipientes::class);
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class, 'id_contenedor', 'id_contenedor');
    }
    use HasFactory;
}
