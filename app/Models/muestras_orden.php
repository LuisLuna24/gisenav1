<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class muestras_orden extends Model
{
    protected $table = 'muestra_orden_servcio';
    protected $primaryKey = 'id_muestra_orden_servicio';
    protected $fillable = [
        'numero_orden_servicio',
        'id_categoria',
        'id_subcategoria',
        'id_tipo_muestra',
        'id_tipo_analisis',
        'id_descrip_muestra',
        'id_analisis_especifico',
        'id_procedencia',
        'cantidad_enviada',
        'productor_responsable',
        'estatus_muestra',
        'no_lote',
        'fecha_muestreo',
        'otros_datos',
        'fecha_envio',
        'idioma_informe',
        'idcontenedor',
        'idprocedencia_orden',
        'idmuestra_internacional',
    ];

    public function orden_servicio(){
        return $this->belongsTo(ordenes::class, 'numero_orden_servicio', 'numero_orden_servicio');
    }

    public function catalogo_categoria(){
        return $this->belongsTo(categorias::class, 'id_categoria', 'id_categoria');
    }

    public function catalogo_subcategoria(){
        return $this->belongsTo(subcategorias::class, 'id_subcategoria', 'id_subcategoria');
    }

    public function catalogo_tipo_muestra(){
        return $this->belongsTo(tipo_muestras::class, 'id_tipo_muestra', 'id_tipo_muestra');
    }

    public function catalogo_tipo_analisis(){
        return $this->belongsTo(tipo_analises::class, 'id_tipo_analisis', 'id_tipo_analisis');
    }

    public function descrip_muestra(){
        return $this->belongsTo(descrip_muestra::class, 'id_descrip_muestra', 'id_descrip_muestra');
    }

    public function catalogo_analisis_especifico(){
        return $this->belongsTo(analisis_especificos::class, 'id_analisis_especifico', 'id_analisis_especifico');
    }

    public function procedencia(){
        return $this->belongsTo(procedencia::class);
    }

    public function contenedor(){
        return $this->belongsTo(contenedores::class, 'id_contenedor', 'id_contenedor');
    }


    use HasFactory;
}
