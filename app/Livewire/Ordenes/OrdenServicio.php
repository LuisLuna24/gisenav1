<?php

namespace App\Livewire\Ordenes;

use App\Models\analisis_especificos;
use App\Models\categorias;
use App\Models\colonias;
use App\Models\contenedores;
use App\Models\descrip_muestra;
use App\Models\estados;
use App\Models\interesados;
use App\Models\muestras_orden;
use App\Models\municipios;
use App\Models\ordenes;
use App\Models\procedencia;
use App\Models\subcategorias;
use App\Models\tipo_analises;
use App\Models\tipo_muestras;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class OrdenServicio extends Component
{
    public $municipios, $estados, $interesados, $colonias, $categorias, $subcategorias, $tipo_muestras, $descripcion_muestras, $tipo_analises, $analisis_especificos, $contenedores;

    #[Reactive]
    public $num_orden;

    public $etc = 2;

    public $OrdenServicio = [
        'prioridad' => '',
        'factura' => '',
        'interesado' => '',
    ];


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
        $this->interesados = interesados::all();

        $orden = ordenes::find($this->num_orden);
        $this->OrdenServicio = [
            'prioridad' => $orden->prioridad,
            'factura' => $orden->requiere_factura,
            'interesado' => $orden->id_interesado,
        ];
    }

    public function enviar_orden()
    {
        $ordenes = ordenes::find($this->num_orden);
        $ordenes->update([
            'prioridad' => $this->OrdenServicio['prioridad'],
            'requiere_factura' => $this->OrdenServicio['factura'],
            'id_interesado' => $this->OrdenServicio['interesado'],
            'estatus_orden'=>'Envío',
        ]);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.ordenes.orden-servicio');
    }
}
