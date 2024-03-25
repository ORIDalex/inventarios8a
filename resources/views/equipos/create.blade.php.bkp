@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
       <h2>Agregar Equipo</h2>
       <hr>
       <form action="{{ route('equipos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
               <label for="numeroserie">Numero de serie</label>
               <input type="text" class="form-control" id="numeroserie" name="numeroserie" value="{{old('numeroserie')}}" />
           </div>
           <div class="form-group">
               <label for="marca">Marca</label>
               <input type="text" class="form-control" id="marca" name="marca" value="{{old('marca')}}" />
           </div>
           <div class="form-group">
               <label for="modelo">Modelo</label>
               <input type="text" class="form-control" id="modelo" name="modelo" value="{{old('modelo')}}" />
           </div>
           <div class="form-group">
               <label for="sistemaoperativo">Sistema Operativo</label>
               <input type="text" class="form-control" id="sistemaoperativo" name="sistemaoperativo" value="{{old('sistemaoperativo')}}" />
           </div>
           <div class="form-group">
               <label for="tipo">Tipo</label>
               <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}" />
           </div>
           <div class="form-group">
               <label for="valor">Valor</label>
               <input type="number" class="form-control" id="valor" name="valor" value="{{old('valor')}}" />
           </div>
           <div class="form-group">
               <label for="anio">Año</label>
               <input type="number" class="form-control" id="anio" name="anio" value="{{old('anio')}}" />
           </div>
           <br>
           <button type="submit" class="btn btn-success">Guardar equipo</button>
       </form>
   </div>
</div>
@endsection
