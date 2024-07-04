<?php

namespace App\Livewire\Ordenes;

use App\Models\muestras_orden;
use App\Models\analisis_especificos;
use App\Models\categorias;
use App\Models\colonias;
use App\Models\contenedores;
use App\Models\descrip_muestra;
use App\Models\estados;
use App\Models\municipios;
use App\Models\procedencia;
use App\Models\subcategorias;
use App\Models\tipo_analises;
use App\Models\tipo_muestras;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class TablaMuestras extends Component
{
    //^=================================================================================================Paginacion
    use WithPagination;

    #[Reactive]
    public $num_orden;

    #[Reactive]
    public $etc;

    public $municipios, $estados, $colonias, $categorias, $subcategorias, $tipo_muestras, $descripcion_muestras, $tipo_analises, $analisis_especificos, $contenedores;

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

    //^=================================================================================================Eliminar
    public $delete_muetsra = false;
    public $muetraIdDelete;
    public function delete_mues($id)
    {
        $this->delete_muetsra = true;
        $this->muetraIdDelete = $id;
    }

    public function eliminar_muestra()
    {
        $muestra = muestras_orden::find($this->muetraIdDelete);
        $muestra->delete();
        $this->delete_muetsra = false;
        $this->muetraIdDelete = null;
    }

    public function cancelar_muestra()
    {
        $this->delete_muetsra = false;
        $this->muetraIdDelete = null;
    }

    //^=================================================================================================Editar

    public $edit_muestras = false;
    public $muestraIdEdit;
    public $EditMustra = [
        'sitio_muestreo_procedencia' => '',
        'nombre_sitio_procedencia' => '',
        'estado_procedencia' => '',
        'colonia_procedencia' => '',
        'municipio_procedencia' => '',
        'calle_procedencia' => '',
        'num_exterior_procedencia' => '',
        'num_interior_procedencia' => '',
        'cp_procedencia' => '',
        'gps_procedencia' => '',
        'sader_procedencia' => '',
        'categoria_muestra' => '',
        'subcategoria_muestra' => '',
        'tipo_muestra' => '',
        'descripcion_muestra' => '',
        'tipo_analisis_mueestra' => '',
        'analisis_especifico_muestra' => '',
        'cantidad_muestra' => '',
        'lote_muestra' => '',
        'fecha_muestreo_muestra' => '',
        'idioma_muestra' => '',
        'contenedor_muestra' => '',
    ];

    public function edit_mues($id)
    {
        $this->edit_muestras = true;
        $this->muestraIdEdit = $id;
        $datosMuestra = muestras_orden::find($this->muestraIdEdit);
        $procedencia = procedencia::find($datosMuestra->id_procedencia);
        $this->EditMustra = [

            'sitio_muestreo_procedencia' => $procedencia->sitio_muestreo,
            'nombre_sitio_procedencia' => $procedencia->nombre_sitio_muestreo,
            'estado_procedencia' => $procedencia->id_estado,
            'colonia_procedencia' => $procedencia->id_colonia,
            'municipio_procedencia' => $procedencia->id_municipio,
            'calle_procedencia' => $procedencia->calle,
            'num_exterior_procedencia' => $procedencia->num_exterior,
            'num_interior_procedencia' => $procedencia->num_interior,
            'cp_procedencia' => $procedencia->cp,
            'gps_procedencia' => $procedencia->gps,
            'sader_procedencia' => $procedencia->registro_seder,

            'categoria_muestra' => $datosMuestra->id_categoria,
            'subcategoria_muestra' => $datosMuestra->id_subcategoria,
            'tipo_muestra' => $datosMuestra->id_tipo_muestra,
            'descripcion_muestra' => $datosMuestra->id_descrip_muestra,
            'tipo_analisis_mueestra' => $datosMuestra->id_tipo_analisis,
            'analisis_especifico_muestra' => $datosMuestra->id_analisis_especifico,
            'cantidad_muestra' => $datosMuestra->cantidad_enviada,
            'lote_muestra' => $datosMuestra->no_lote,
            'productor_muestra' => $datosMuestra->productor_responsable,
            'fecha_muestreo_muestra' => $datosMuestra->fecha_muestreo,
            'idioma_muestra' => $datosMuestra->idioma_informe,
            'contenedor_muestra' => $datosMuestra->idcontenedor,
        ];
    }

    public function editar_muestra()
    {
        $datosMuestra = muestras_orden::find($this->muestraIdEdit);
        $procedencia_muestra = procedencia::find($datosMuestra->id_procedencia);
        $procedencia_muestra->update([
            'sitio_muestreo' => $this->EditMustra['sitio_muestreo_procedencia'],
            'nombre_sitio_muestreo' => $this->EditMustra['nombre_sitio_procedencia'],
            'id_estado' => $this->EditMustra['estado_procedencia'],
            'id_colonia' => $this->EditMustra['colonia_procedencia'],
            'id_municipio' => $this->EditMustra['municipio_procedencia'],
            'calle' => $this->EditMustra['calle_procedencia'],
            'num_exterior' => $this->EditMustra['num_exterior_procedencia'],
            'num_interior' => $this->EditMustra['num_interior_procedencia'],
            'cp' => $this->EditMustra['cp_procedencia'],
            'gps' => $this->EditMustra['gps_procedencia'],
            'registro_seder' => $this->EditMustra['sader_procedencia']
        ]);

        $datosMuestra->update([
            'id_categoria'=>$this->EditMustra['categoria_muestra'],
            'id_subcategoria'=>$this->EditMustra['subcategoria_muestra'],
            'id_tipo_muestra'=>$this->EditMustra['tipo_muestra'],
            'id_tipo_analisis'=>$this->EditMustra['tipo_analisis_mueestra'],
            'id_descrip_muestra'=>$this->EditMustra['descripcion_muestra'],
            'id_analisis_especifico'=>$this->EditMustra['analisis_especifico_muestra'],
            'cantidad_enviada'=>$this->EditMustra['cantidad_muestra'],
            'productor_responsable'=>$this->EditMustra['productor_muestra'],
            'no_lote'=>$this->EditMustra['lote_muestra'],
            'fecha_muestreo'=>$this->EditMustra['fecha_muestreo_muestra'],
            'idioma_informe'=>$this->EditMustra['idioma_muestra'],
            'idcontenedor'=>$this->EditMustra['contenedor_muestra'],
        ]);

        $this->edit_muestras = false;
        $this->muestraIdEdit = null;
        $this->reset(['EditMustra']);
        
    }

    public function cancel_edit_muestra()
    {
        $this->edit_muestras = false;
        $this->muestraIdEdit = null;
        $this->reset(['EditMustra']);
    }

    public function render()
    {
        $muetras = muestras_orden::where('numero_orden_servicio', '=', $this->num_orden)->paginate(10);
        return view('livewire.ordenes.tabla-muestras', compact('muetras'));
    }
}
