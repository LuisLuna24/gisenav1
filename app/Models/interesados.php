<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interesados extends Model
{
    protected $table = 'interesado';
    protected $primaryKey = 'id_interesado';
    protected $fillable = [
        'nombre',
        'a_paterno',
        'a_materno',
        'telefono',
        'telefono_alternativo',
        'correo',
        'correo_alternativo',
        'idcontacto',
        'id_gestor',
        'id_direccion',
        'direccion_gestor_id_gestor'
    ];

    public function orden_servicio()
    {
        return $this->hasMany(ordenes::class);
    }
    use HasFactory;
}
