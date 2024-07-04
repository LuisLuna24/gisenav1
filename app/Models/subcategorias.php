<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategorias extends Model
{
    //^==============================================Datos de Tablas
    protected $table = 'catalogo_subcategoria';
    protected $primaryKey = 'id_subcategoria';
    protected $fillable = [
        'nom_subcategoria',
        'id_categoria',
    ];

    public function categoria(){
        return $this->belongsTo(categorias::class, 'id_categoria', 'id_categoria');
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);
    }

    use HasFactory;
}
