<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipientes extends Model
{
    protected $table ='recipientes';
    protected $primaryKey = 'id_recipiente';
    protected $fillable = [
        'tipo_recipiente',
        'idcontenedor',
        'catidad_recipiente',
    ];

    public function contenedor(){
        return $this->belongsTo(contenedores::class, 'idcontenedor', 'id_contenedor');  //relacion uno a muchos con contenedor por id_contenedor.  //contenedor es el nombre de la tabla en plural y id_contenedor es el nombre del campo id en la tabla contenedor.  //Este campo debe estar en la tabla recipiente.  //Este campo debe ser una llave foranea en la tabla recipiente.  //Este campo debe ser una llave foranea en la tabla contenedor.  //Este campo debe ser una llave foranea en la tabla recipiente.  //Este campo debe ser una llave foranea en la tabla contenedor.  //Este campo debe ser una llave foranea en la tabla recipiente.  //Este campo debe ser una llave foranea en la tabla contenedor.  //
    }
    use HasFactory;
}
