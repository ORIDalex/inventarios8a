@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear un nuevo video</h2>
       <hr>
       <form action="{{ route('estaciones.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif

campanias_id
visible

           <div class="form-group">
               <label for="equipos_id">Equipo </label>
               <input type="text" class="form-control" id="equipos_id" name="equipos_id" value="{{old('equipos_id')}}" />
           </div>
           <div class="form-group">
               <label for="nodo">Nodo</label>
               <input type="text" class="form-control" id="nodo" name="nodo" value="{{old('nodo')}}" />
           </div>
           <div class="form-group">
               <label for="piso">Piso</label>
               <input type="text" class="form-control" id="piso" name="piso" value="{{old('piso')}}" />
           </div>
           <div class="form-group">
               <label for="campanias_id">Campaña</label>
               <input type="text" class="form-control" id="campanias_id" name="campanias_id" value="{{old('campanias_id')}}" />
           </div>
           <!--<div class="form-group">
               <label for="campanias_id">Campaña</label>
               <select class="form-select" id="estado" name="estado">
                    <option value="visible" selected>Visible</option>
                    <option value="invisible">Invisible</option>
                </select>
           </div>!-->
           <div class="form-group">
               <label for="supervisor">Supervisor</label>
               <input type="text" class="form-control" id="supervisor" name="supervisor" value="{{old('supervisor')}}" />
           </div>
           <div class="form-group">
               <label for="estado">Estado</label>
               <select class="form-select" id="estado" name="estado">
                    <option value="habilitada" selected>Habilitada</option>
                    <option value="deshabilitada">Deshabilitada</option>
                </select>
           </div>
           <div class="form-group">
               <label for="visible">Visible</label>
               <select class="form-select" id="visible" name="visible">
                    <option value="visible" selected>Visible</option>
                    <option value="invisible">Invisible</option>
                </select>
           </div>
           <button type="submit" class="btn btn-success">Guardar Estacion</button>
       </form>
   </div>
</div>
@endsection
