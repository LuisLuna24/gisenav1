<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    //^==============================================Datos de Tablas
    protected $table = 'orden_servicio';
    protected $primaryKey = 'numero_orden_servicio';
    protected $fillable = [
        'numero_orden_servicio',
        'fecha_orden',
        'prioridad',
        'requiere_factura',
        'inf_adicional',
        'estatus_orden',
        'descripcion_estatus_orden',
        'id_cliente',
        'id_cotizacion',
        'id_interesado',
        'remision_muestra',
        'tipo_documento',
        'folio_documento',
        'netsuite',
    ];
    //^==============================================Relaciones

    public function interesado(){
        return $this->belongsTo(interesados::class, 'id_interesado', 'id_interesado');
    }

    public function clientes(){
        return $this->belongsTo(clientes::class, 'id_cliente', 'id_cliente');
    }

    use HasFactory;
}
