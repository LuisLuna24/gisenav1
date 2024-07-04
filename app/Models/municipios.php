<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{

    protected $table ='municipio';
    protected $primaryKey = 'id_municipio';
    protected $fillable = [
        'id_estado',
        'nombre',
        'descripcion'
    ];

    public function estado(){
        return $this->belongsTo(estados::class,'id_estado','id_estado');
    }

    public function colonias(){
        return $this->hasMany(colonias::class);
    }
    
    use HasFactory;
}
