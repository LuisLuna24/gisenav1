<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colonias extends Model
{
    protected $table = 'colonia';
    protected $primaryKey = 'id_colonia';
    protected $fillable = [
        'nombre_colonia',
        'clave_colonia',
        'descripcion',
        'id_municipio',
    ];

    public function municipio(){
        return $this->belongsTo(municipios::class, 'id_municipio', 'id_municipio');
    }
    use HasFactory;
}
