<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Equipos;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos=Equipos::paginate();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('equipos.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'numeroserie' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'sistemaoperativo' => 'required',
        'tipo' => 'required',
        'valor' => 'required',
        'anio' => 'required'
         ]);
         
         
         $equipo = new Equipos();
         $equipo->numeroserie = $request->input('numeroserie');
         $equipo->marca = $request->input('marca');
         $equipo->modelo = $request->input('modelo');
         $equipo->sistemaoperativo = $request->input('sistemaoperativo');
         $equipo->tipo = $request->input('tipo');
         $equipo->valor = $request->input('valor');
         $equipo->anio = $request->input('anio');
         $equipo->estado = "Sin asignar";
         $equipo->save();
         return redirect()->route('equipos.index')->with(array(
            'message' => 'El equipo se ha guardado correctamente'
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
        $equipo = Equipos::find($request->input('id'));
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'numeroserie' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'sistemaoperativo' => 'required',
            'tipo' => 'required',
            'valor' => 'required',
            'anio' => 'required',
            'estado' => 'required'
             ]);
             
             
             $equipo = Equipos::find($request->input('id'));
             $equipo->numeroserie = $request->input('numeroserie');
             $equipo->marca = $request->input('marca');
             $equipo->modelo = $request->input('modelo');
             $equipo->sistemaoperativo = $request->input('sistemaoperativo');
             $equipo->tipo = $request->input('tipo');
             $equipo->valor = $request->input('valor');
             $equipo->anio = $request->input('anio');
             $equipo->estado = $request->input('estado');
             $equipo->save();
             return redirect()->route('equipos.index')->with(array(
                'message' => 'El equipo se ha actualizado correctamente'
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
    public function LogicDelete($equipo_id){
        $equipo = Equipos::find($equipo_id);
        if($equipo){
            $equipo->estado = "destruccion";
            $equipo->update();
            return redirect()->route('equipos.index')->with(array(
                "message" => "El equipo se ha asignado a destruccion correctamente"));
        }else{
            return redirect()->route('campanias.index')->with(array(
           "message" => "El equipo no existe"));
        }
     }
}
