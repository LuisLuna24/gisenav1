<?php

namespace App\Livewire\Ordenes;

use App\Models\analisis_especificos;
use App\Models\categorias;
use App\Models\colonias;
use App\Models\contenedores;
use App\Models\descrip_muestra;
use App\Models\estados;
use App\Models\muestras_orden;
use App\Models\municipios;
use App\Models\procedencia;
use App\Models\subcategorias;
use App\Models\tipo_analises;
use App\Models\tipo_muestras;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Muestra extends Component
{
    public $municipios, $estados, $colonias, $categorias, $subcategorias, $tipo_muestras, $descripcion_muestras, $tipo_analises, $analisis_especificos, $contenedores;

    #[Reactive]
    public $num_orden;

    public function mount()
    {
        $this->municipios = municipios::all();
        $this->estados = estados::all();
        $this->colonias = colonias::all();
        $this->categorias = categorias::all();
        $this->subcategorias = subcategorias::all();
        $this->tipo_muestras = tipo_muestras::all();
        $this->descripcion_muestras = descrip_muestra::all();
        $this->tipo_analises = tipo_analises::all();
        $this->analisis_especificos = analisis_especificos::all();
        $this->contenedores = contenedores::all();
    }

    //^==============================================Nueva Muestra

    public $orden_muestras = false;
    public $cantidadMinima, $unidad_medida, $sitio_muestreo_procedencia, $nombre_sitio_procedencia, $estado_procedencia, $colonia_procedencia, $municipio_procedencia,
        $calle_procedencia, $num_exterior_procedencia, $num_interior_procedencia, $cp_procedencia, $gps_procedencia, $sader_procedencia,
        $categoria_muestra, $subcategoria_muestra, $tipo_muestra, $descripcion_muestra, $tipo_analisis_mueestra, $analisis_especifico_muestra,
        $cantidad_muestra, $lote_muestra, $productor_muestra, $fecha_muestreo_muestra, $idioma_muestra = "Español", $contenedor_muestra;


    public function open_modal()
    {
        $this->orden_muestras = true;
    }
    public function new_muestra()
    {
        if ($this->tipo_muestra) {
            $producto = tipo_muestras::find($this->tipo_muestra);
            $this->cantidadMinima = $producto->cantidad_requerida;
            $this->unidad_medida = $producto->unidad_medida->nombre_unidad;
        } else {
            $this->cantidadMinima = 0;
            $this->unidad_medida = '';
        }



        $this->validate([
            'sitio_muestreo_procedencia' => "required|max:250",
            'nombre_sitio_procedencia' => "required|max:250",
            'estado_procedencia' => "required",
            'colonia_procedencia' => "required",
            'municipio_procedencia' => "required",
            'calle_procedencia' => "required|max:250",
            'num_exterior_procedencia' => "required|integer",
            'num_interior_procedencia' => "nullable|integer",
            'cp_procedencia' => "required|integer",
            'gps_procedencia' => "nullable|max:45",
            'sader_procedencia' => "nullable|max:15",

            'categoria_muestra' => "required",
            'subcategoria_muestra' => "required",
            'tipo_muestra' => "required",
            'descripcion_muestra' => "required",
            'tipo_analisis_mueestra' => "required",
            'analisis_especifico_muestra' => "required",
            'cantidad_muestra' => "required|integer|min:{$this->cantidadMinima}",
            'lote_muestra' => "required|integer",
            'productor_muestra' => "required|max:100",
            'fecha_muestreo_muestra' => "required|date",
            'idioma_muestra' => "nullable|max:25",
            'contenedor_muestra' => "required",
        ], [
            'sitio_muestreo_procedencia.required' => 'El sitio de muestreo es requerido.',
            'nombre_sitio_procedencia.required' => 'El nombre del sitio de muestreo es requerido.',
            'estado_procedencia.required' => 'El estado de procedencia es requerido.',
            'colonia_procedencia.required' => 'La colonia de procedencia es requerida.',
            'municipio_procedencia.required' => 'El municipio de procedencia es requerido.',
            'calle_procedencia.required' => 'La calle de procedencia es requerida.',
            'num_exterior_procedencia.required' => 'El número exterior de procedencia es requerido.',
            'num_exterior_procedencia.integer' => 'El número exterior de',
            'num_interior_procedencia.nullable' => 'El número interior de procedencia es opcional.',
            'num_interior_procedencia.integer' => 'El número interior de procedencia debe ser un número entero.',
            'cp_procedencia.required' => 'El código postal de procedencia es requerido.',
            'cp_procedencia.integer' => 'El código postal de procedencia debe ser un número entero.',
            'gps_procedencia.nullable' => 'La ubicación GPS de procedencia es opcional.',
            'gps_procedencia.max' => 'La ubicación GPS de procedencia no puede superar los 45 caracteres.',
            'sader_procedencia.nullable' => 'El número de SADER de procedencia es opcional.',
            'sader_procedencia.max' => 'El número de SADER de procedencia no
            puede superar los 15 caracteres.',
            'categoria_muestra.required' => 'La categoría de muestra es requerida.',
            'subcategoria_muestra.required' => 'La subcategoría de muestra es requerida.',
            'tipo_muestra.required' => 'El tipo de muestra es requerido.',
            'descripcion_muestra.require' => 'La descripción de muestra es requerida.',
            'tipo_analisis_mueestra.required' => 'El tipo de análisis de muestra es requerido.',
            'analisis_especifico_muestra.required' => 'El análisis específico de muestra es requer',
            'cantidad_muestra.required' => 'La cantidad de muestra es requerida.',
            'cantidad_muestra.integer' => 'La cantidad de muestra debe ser un número entero.',
            'cantidad_muestra.min' => 'La cantidad de muestra debe ser al menos :min .' . $this->unidad_medida,
            'lote_muestra.required' => 'El lote de muestra es requerido.',
            'lote_muestra.integer' => 'El lote de muestra debe ser un número entero.',
            'productor_muestra.required' => 'El nombre del productor es requerido.',
            'productor_muestra.max' => 'El nombre del productor no puede superar los 100 caracteres.',
            'fecha_muestreo_muestra.required' => 'La fecha de muestreo es requerida',
            'fecha_muestreo_muestra.date' => 'La fecha de muestreo debe ser una fecha válida.',
            'idioma_muestra.nullable' => 'El idioma del informe es opcional.',
            'idioma_muestra.max' => 'El idioma del informe no puede superar los 25 caracteres.',
            'contenedor_muestra.required' => 'El contenedor de muestra es requerido.',
        ]);

        // Agregar procedencia 
        $procedencia = procedencia::create([
            'sitio_muestreo' => $this->sitio_muestreo_procedencia,
            'nombre_sitio_muestreo' => $this->nombre_sitio_procedencia,
            'id_estado' => $this->estado_procedencia,
            'id_colonia' => $this->colonia_procedencia,
            'id_municipio' => $this->municipio_procedencia,
            'calle' => $this->calle_procedencia,
            'num_exterior' => $this->num_exterior_procedencia,
            'num_interior' => $this->num_interior_procedencia,
            'cp' => $this->cp_procedencia,
            'gps' => $this->gps_procedencia,
            'registro_seder' => $this->sader_procedencia
        ]);
        // Agregar muestra
        $muestra = muestras_orden::create([
            'numero_orden_servicio' => $this->num_orden,
            'id_categoria' => $this->categoria_muestra,
            'id_subcategoria' => $this->subcategoria_muestra,
            'id_tipo_muestra' => $this->tipo_muestra,
            'id_tipo_analisis' => $this->tipo_analisis_mueestra,
            'id_descrip_muestra' => $this->descripcion_muestra,
            'id_analisis_especifico' => $this->analisis_especifico_muestra,
            'id_procedencia' => $procedencia->id_procedencia,
            'cantidad_enviada' => $this->cantidad_muestra,
            'productor_responsable' => $this->productor_muestra,
            'no_lote' => $this->lote_muestra,
            'estatus_muestra' => "Envío",
            'fecha_muestreo' => $this->fecha_muestreo_muestra,
            'otros_datos' => 'Sin otros Datos',
            'fecha_envio' => now(),
            'idioma_muestra' => $this->idioma_muestra,
            'idcontenedor' => $this->contenedor_muestra,
        ]);

        $this->orden_muestras = false;
        $this->reset([
            'num_orden','categoria_muestra','subcategoria_muestra','tipo_muestra','tipo_analisis_mueestra','descripcion_muestra','analisis_especifico_muestra',
            'id_procedencia','cantidad_muestra','productor_muestra','lote_muestra','fecha_muestreo_muestra','idioma_muestra','contenedor_muestra'
        ]);
    }

    public function reset_procedencia(){
        $this->reset([
            'sitio_muestreo_procedencia','nombre_sitio_procedencia','estado_procedencia','colonia_procedencia','municipio_procedencia','calle_procedencia','num_exterior_procedencia','num_interior_procedencia','cp_procedencia','gps_procedencia','sader_procedencia'
        ]);
    }

    public function cancel_muestra(){
        $this->orden_muestras = false;
        $this->reset([
            'categoria_muestra', 'subcategoria_muestra', 'tipo_muestra', 'descripcion_muestra', 'tipo_analisis_mueestra', 'analisis_especifico_muestra',
            'cantidad_muestra', 'lote_muestra', 'productor_muestra', 'fecha_muestreo_muestra', 'idioma_muestra', 'contenedor_muestra'
        ]);
    }


    //^==============================================Render

    public function render()
    {
        return view('livewire.ordenes.muestra');
    }
}
