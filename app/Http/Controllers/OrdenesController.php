<?php

namespace App\Http\Controllers;

use App\Models\interesados;
use App\Models\muestras_orden;
use App\Models\ordenes;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $interesados=interesados::all();
        return view('ordenes.create', compact('interesados'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Agregar orde_servicio y redirigir a crear.muestras mandandole el numero_orden_servicio
        $orden=ordenes::create([
            'numero_orden_servicio'=> $request->numero_orden_servicio,
            'descripcion'=> $request->descripcion,
            'estado'=> $request->estado,
            'interesado_id'=> $request->interesado_id,
        ]);
        return redirect()->route('ordenes.muestra',$orden->numero_orden_servicio);
    }
    
    public function new_muestra(Request $request, ordenes $no_orden){
        $num_orden=$no_orden->numero_orden_servicio;
        $etc=1;
        $muetras=muestras_orden::where('numero_orden_servicio','=',$no_orden->numero_orden_servicio)->get();
        return view('ordenes.muestra', compact('muetras','num_orden','etc'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,ordenes $no_orden)
    {
        $num_orden=$no_orden->numero_orden_servicio;
        return view('ordenes.show',compact('num_orden') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ordenes $ordenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordenes $ordenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordenes $ordenes)
    {
        //
    }
}
