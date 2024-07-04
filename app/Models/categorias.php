<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $table = 'catalogo_categoria';
    protected $primaryKey = 'id_categoria';
    protected $fillable = [
        'nombre_categoria',
        'descripcion',
    ];


    public function catalogo_subcategorias(){
        return $this->hasMany(subcategorias::class, 'id_categoria');
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class, 'id_catalogo_categoria');
    }
    use HasFactory;
}
