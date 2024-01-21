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


           <div class="form-group">
               <label for="nombre">nombre</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
           </div>
           <div class="form-group">
               <label for="domicilio">Descripción</label>
               <textarea class="form-control" id="domicilio" name="domicilio">{{old('domicilio')}}</textarea>
           </div>
           <div class="form-group">
               <label for="correo">E-mail</label>
               <textarea class="form-control" id="correo" name="correo">{{old('correo')}}</textarea>
           </div>
           <button type="submit" class="btn btn-success">Guardar Editorial</button>
       </form>
   </div>
</div>
@endsection
