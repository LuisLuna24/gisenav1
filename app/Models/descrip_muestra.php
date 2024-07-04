<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descrip_muestra extends Model
{
    protected $table = 'descrip_muestra';
    protected $primaryKey = 'id_descrip_muestra';
    protected $fillable = [
        'nombre_descrip',
        'id_tipo_muestra',
    ];

    public function catalogo_tipo_muestra(){
        return $this->belongsTo(tipo_muestras::class, 'id_tipo_muestra', 'id_tipo_muestra');
    }

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);
    }
    
    use HasFactory;
}
