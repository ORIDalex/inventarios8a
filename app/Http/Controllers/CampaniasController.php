<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanias;

class CampaniasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('campanias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('campanias.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'extensiones' => 'required',
            'direccion' => 'required',
            'estado' => 'required'
         ]);
         
         
         $campania = new Campanias();
         $campania->nombre = $request->input('nombre');
         $campania->descripcion = $request->input('descripcion');
         $campania->extensiones = $request->input('extensiones');
         $campania->direccion = $request->input('direccion');
         $campania->estado = $request->input('estado');
         $campania->save();
         return redirect()->route('campanias.index')->with(array(
            'message' => 'La Campaña se ha guardado correctamente'
         ));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
