<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procedencia extends Model
{
    protected $table = 'procedencia';
    protected $primaryKey = 'id_procedencia';
    protected $fillable = [
        'sitio_muestreo',
        'nombre_sitio_muestreo',
        'id_estado',
        'id_colonia',
        'id_municipio',
        'calle',
        'num_exterior',
        'num_interior',
        'cp',
        'gps',
        'registro_seder'
    ];

    public function muestra_orden_servicio(){
        return $this->hasMany(muestras_orden::class);
    }
    use HasFactory;
}
