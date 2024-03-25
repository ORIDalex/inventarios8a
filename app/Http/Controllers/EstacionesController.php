<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Estaciones;
use App\models\Campanias;
use App\models\Equipos;

class EstacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estaciones=Estaciones::paginate();
        return view('estaciones.index', compact('estaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $campanias=Campanias::all();
        $equipos=Equipos::all();
        return view('estaciones.create')->with('campanias', $campanias)->with('equipos', $equipos);
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
        $campania=Campanias::find($request->input('campanias_id'));
        $equipo=Equipos::find($request->input('equipos_id'));
        $estacion->equipos_id = "$equipo->numeroserie";
        $estacion->nodo = $request->input('nodo');
        $estacion->piso = $request->input('piso');
        $estacion->campanias_id = $campania->nombre;
        $estacion->estado = $request->input('estado');
        $estacion->supervisor = $request->input('supervisor');
        $estacion->visible = $request->input('visible');
        $estacion->save();
        $equipo->estado='Asignado';
        $equipo->update();
         
         return redirect()->route('estaciones.index')->with(array(
            'message' => 'La Estacion se ha guardado correctamente'
         ));

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
        $estacion = Estaciones::find($request->input('id'));
        $campanias=Campanias::all();
        $equipos=Equipos::all();
        return view('estaciones.edit')->with('campanias', $campanias)->with('equipos', $equipos)->with('estacion', $estacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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
        
        
        $estacion = Estaciones::find($request->input('id'));
        if($request->input('equipos_old')!="vacia"){
            $equipo=Equipos::where("numeroserie", $request->input('equipos_old'))->first();
            $equipo->estado='Sin asignar';
            $equipo->update();
        }
        if($request->input('equipos_id')!="vacia"){
            $equipo=Equipos::where("numeroserie", $request->input('equipos_id'))->first();
            $equipo->estado='Asignado';
            $equipo->update();
        }
        
        $estacion->equipos_id = $request->input('equipos_id');
        $estacion->nodo = $request->input('nodo');
        $estacion->piso = $request->input('piso');
        $estacion->campanias_id = $request->input('campanias_id');
        $estacion->estado = $request->input('estado');
        $estacion->supervisor = $request->input('supervisor');
        $estacion->visible = $request->input('visible');
        $estacion->save();
        return redirect()->route('estaciones.index')->with(array(
            'message' => 'La Estacion se ha actualizado correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function LogicDelete($equipo_id){
        $estacion = Estaciones::find($equipo_id);
        if($estacion){
            $estacion->visible = "invisible";
            $estacion->update();
            return redirect()->route('estaciones.index')->with(array(
                "message" => "La estacion se eliminado correctamente"));
        }else{
            return redirect()->route('estaciones.index')->with(array(
            "message" => "La estacion no existe"));
        }
     }
}
