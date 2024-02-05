@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Agregar Campaña'])
    <div class="container-fluid py-4">
        <div class="row">
            <form action="{{ route('campanias.store') }}" method="post" enctype="multipart/form-data" class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Campaña</p>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Encargado</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extensiones">Extensiones</label>
                                    <textarea class="form-control" id="extensiones" name="extensiones">{{old('extensiones')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-select" id="estado" name="estado">
                                            <option value="habilitada" selected>Habilitada</option>
                                            <option value="deshabilitada">Deshabilitada</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm ms-auto">Guardar campaña</button>
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
