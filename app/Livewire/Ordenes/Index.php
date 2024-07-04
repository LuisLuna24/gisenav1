<?php

namespace App\Livewire\Ordenes;

use App\Models\ordenes;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    //^=================================================================================================Paginacion
    use WithPagination;

    //^=================================================================================================Filtros
    public $registros = "10";
    public $estado_orden = "";
    public $fecha1='';
    public $fecha2='';
    public $search='';
    //^=================================================================================================Validacion
    protected $rules = [
        'fecha1' => 'required|date|before_or_equal:fecha2',
        'fecha2' => 'required|date|after_or_equal:fecha1',
    ];

    //^=================================================================================================Mensajes de validacion
    public function messages()
    {
        return [
            'fecha1.required' => 'Debe seleccionar una fecha inicial.',
            'fecha1.date' => 'La fecha inicial debe ser una fecha válida.',
            'fecha1.before_or_equal' => 'La fecha inicial debe ser anterior o igual a la fecha final.',
            'fecha2.required' => 'Debe seleccionar una fecha final.',
            'fecha2.date' => 'La fecha final debe ser una fecha válida.',
            'fecha2.after_or_equal' => 'La fecha final debe ser posterior o igual a la fecha inicial.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->fecha1 = now()->format('Y-m-d');
        $this->fecha2 = now()->format('Y-m-d');
        $this->validate();
    }

    //^=================================================================================================Mensajes de validacion

    public $cancelar_orden=false;
    public $cancelar_orden_id;
    public function delete($id){
        $this->cancelar_orden = true;
        $this->cancelar_orden_id = $id;
    }

    public function delete_orden(){
        $orden = ordenes::find($this->cancelar_orden_id);
        $orden->estatus_orden = 'Cancelada';
        $orden->save();
        $this->cancelar_orden = false;
        $this->cancelar_orden_id = null;
    }

    //^=================================================================================================render
    public function render()
    {
        $ordenes = ordenes::where('numero_orden_servicio','LIKE','%' . $this->search . '%')->where('estatus_orden', 'LIKE','%' . $this->estado_orden . '%')->whereBetween('fecha_orden', [$this->fecha1, $this->fecha2])->paginate($this->registros);
        return view('livewire.ordenes.index', compact('ordenes'));
    }
}
