@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
       <h2>Agregar Campaña</h2>
       <hr>
       <form action="{{ route('campanias.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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


           <div class="form-group">
               <label for="nombre">Nombre</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Descripción</label>
               <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
           </div>
           <div class="form-group">
               <label for="extensiones">Extensiones</label>
               <textarea class="form-control" id="extensiones" name="extensiones">{{old('extensiones')}}</textarea>
           </div>
           <div class="form-group">
               <label for="direccion">Direccion</label>
               <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}" />
           </div>
           <div class="form-group">
               <label for="estado">Estado</label>
               <select class="form-select" id="estado" name="estado">
                    <option value="habilitada" selected>Habilitada</option>
                    <option value="deshabilitada">Deshabilitada</option>
                </select>
           </div>
           <br>
           <button type="submit" class="btn btn-success">Guardar campaña</button>
       </form>
   </div>
</div>
@endsection
