<?php

namespace App\Livewire\Ordenes;

use App\Models\clientes;
use App\Models\interesados;
use App\Models\ordenes;
use Livewire\Component;

class Create extends Component
{
    public $interesados;

    public function mount()
    {
        $clientes=clientes::find(auth()->user()->id);
        $this->interesados = interesados::where('idcontacto','=',$clientes->idcontacto)->get();
    }


    public $prioridad, $factura, $interesado;
        
    public $interesado_igual;

    public function new_order()
    {
        if($this->interesado_igual){
            $this->validate([
                'prioridad' => 'required',
                'factura' => 'required',
                'interesado' => 'required',
            ],[
                'prioridad.required' => 'La prioridad es obligatoria.',
                'factura.required' => 'La requiere factura es obligatoria.',
                'interesado.required' => 'El interesado es obligatorio.',
            ]);
        }else{
            $this->validate([
                'prioridad' => 'required',
                'factura' => 'required',
            ],[
                'prioridad.required' => 'La prioridad es obligatoria.',
                'factura.required' => 'La requiere factura es obligatoria.',
            ]);
        }
        

        $orden = ordenes::create([
            'fecha_orden' => now(),
            'prioridad' => $this->prioridad,
            'requiere_factura' => $this->factura,
            'estatus_orden' => 'Captura',
            'id_cliente' => auth()->user()->id,
            'id_interesado' => $this->interesado,
        ]);
        return redirect()->route('ordenes.muestra', $orden->numero_orden_servicio);
    }
    public function render()
    {
        return view('livewire.ordenes.create');
    }
}
