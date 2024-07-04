<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estados extends Model
{

    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $fillable = [
        'nombre',
        'clave_estado',
        'descripcion'
    ];
    //^==============================================Relaciones con otras tablas
    public function municipio(){
        return $this->belongsTo(municipios::class);
    }
    use HasFactory;
}
