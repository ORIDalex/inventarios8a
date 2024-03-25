@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Editar Campaña'])
    <div class="container-fluid py-4">
        <div class="row">
            <form action="{{ route('equipos-update') }}" method="post" enctype="multipart/form-data" class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Equipo {{$equipo->nombre}}</p>
                        </div>
                    </div>
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
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Informacion de campaña</p>
                        <div class="ms-auto text-end">
                            <button class="btn btn-link text-dark px-3 mb-0"><i
                                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Guardar</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numeroserie">numeroserie</label>
                                    <input type="text" class="form-control" id="numeroserie" name="numeroserie" value="{{$equipo->numeroserie}}" />
                                    <input type="hidden"  class="form-control" id="id" name="id" value="{{$equipo->id}}" />
                                    <input type="hidden"  class="form-control" id="estado" name="estado" value="{{$equipo->estado}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" class="form-control" id="marca" name="marca" value="{{$equipo->marca}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{$equipo->modelo}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sistemaoperativo">Sistema Operativo</label>
                                    <input type="text" class="form-control" id="sistemaoperativo" name="sistemaoperativo" value="{{$equipo->sistemaoperativo}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{$equipo->tipo}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" class="form-control" id="valor" name="valor" value="{{$equipo->valor}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anio">Año</label>
                                    <input type="number" class="form-control" id="anio" name="anio" value="{{$equipo->anio}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-select" id="estado" name="estado">
                                        <option {{($equipo->estado== "destruccion") ? 'selected' : ''}} value="destruccion">Destruccion</option>
                                        <option {{($equipo->estado== "Sin asignar") ? 'selected' : ''}} value="Sin asignar">Sin asignar</option>
                                        <option {{($equipo->estado== "Asignado") ? 'selected' : ''}} value="Asignado">Asignado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
