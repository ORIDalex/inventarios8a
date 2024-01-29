<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Estaciones;

class EstacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('estaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('estaciones.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'equipos_id' => 'required',
            'nodo' => 'required',
            'piso' => 'required',
            'campanias_id' => 'required',
            'estado' => 'required',
            'supervisor' => 'required',
            'visible' => 'required'
         ]);
         
         
         $estacion = new Estaciones();
         $estacion->equipos_id = $request->input('equipos_id');
         $estacion->nodo = $request->input('nodo');
         $estacion->piso = $request->input('piso');
         $estacion->campanias_id = $request->input('campanias_id');
         $estacion->estado = $request->input('estado');
         $estacion->supervisor = $request->input('supervisor');
         $estacion->visible = $request->input('visible');
         $estacion->save();
         return redirect()->route('estaciones.index')->with(array(
            'message' => 'La Estacion se ha guardado correctamente'
         ));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
