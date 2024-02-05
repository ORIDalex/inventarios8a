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
        $campanias=Campanias::paginate();
        return view('campanias.index', compact('campanias'));
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
         return redirect()->route('campanias')->with(array(
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
    public function edit(Request $request)
    {
        //
        $this->validate($request, [
            'id'=>'required'
        ]);
        $campania = Campanias::find($request->input('id'));
        return view('campanias.edit', compact('campania'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'id'=>'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'extensiones' => 'required',
            'direccion' => 'required',
            'estado' => 'required'
         ]);
         
         $campania = Campanias::find($request->input('id'));
         $campania->nombre = $request->input('nombre');
         $campania->descripcion = $request->input('descripcion');
         $campania->extensiones = $request->input('extensiones');
         $campania->direccion = $request->input('direccion');
         $campania->estado = $request->input('estado');
         $campania->update();
         return redirect()->route('campanias')->with(array(
            'message' => 'La Campaña se ha actualizado correctamente'
         ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Elimina de manera logica un registro de la base de datos.
     */
    public function LogicDelete(string $id){
        $campania = Campanias::find($id);
        if($campania){
            $campania->estado = ($campania->estado == "deshabilitada") ? "habilitada" : "deshabilitada";
            $campania->update();
            return redirect()->route('campanias')->with(array(
                "message" => "La campaña se ha eliminado correctamente"));
        }else{
            return redirect()->route('campanias')->with(array(
           "message" => "La campaña que trata de eliminar no existe"));
        }
     }
     
}
