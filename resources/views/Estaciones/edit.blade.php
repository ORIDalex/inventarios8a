@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Agregar Campaña'])
    <div class="container-fluid py-4">
        <div class="row">
            <form action="{{ route('estacion-update') }}" method="post" enctype="multipart/form-data" class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Estacion {{$estacion->id}}</p>
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
                        <p class="text-uppercase text-sm">Informacion de Estacion</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="equipos_id">Equipos</label>
                                    <select class="form-select" id="equipos_id" name="equipos_id">
                                        <option value='{{($estacion->equipos_id=="vacia") ? "": "vacia"}}'>{{($estacion->equipos_id=="vacia") ? "": "Vacia"}}</option>
                                        <option selected value={{$estacion->equipos_id}}>{{$estacion->equipos_id}}</option>
                                    @foreach($equipos as $equipo)
                                        @if($equipo->estado == 'Sin asignar')
                                        <option value={{$equipo->numeroserie}}>{{$equipo->numeroserie}}</option>
                                        @endif
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nodo">Nodo</label>
                                    <input type="number" class="form-control" id="nodo" name="nodo" value="{{$estacion->nodo}}" />
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$estacion->id}}" />
                                    <input type="hidden" class="form-control" id="equipos_old" name="equipos_old" value="{{$estacion->equipos_id}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="piso">Piso</label>
                                    <input type="text" class="form-control" id="piso" name="piso" value="{{$estacion->piso}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="campanias_id">Campaña</label>
                                    <select class="form-select" id="campanias_id" name="campanias_id">
                                    @foreach($campanias as $campania)
                                        @if($campania->estado == 'habilitada')
                                        <option {{($campania->nombre==$estacion->campanias_id? 'selected': '')}} value="{{$campania->nombre}}">{{$campania->nombre}}</option>
                                        @endif
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-select" id="estado" name="estado">
                                        <option value="vacia" {{($estacion->estado=="vacia" ? 'selected': '')}}>Vacia</option>
                                        <option value="mantenimiento "{{($estacion->estado=="mantenimiento" ? 'selected': '')}}>Mantenimiento</option>
                                        <option value="habilitada"  {{($estacion->estado=="habilitada" ? 'selected': '')}}>Habilitada</option>
                                        <option value="incompleta "{{($estacion->estado=="incompleta" ? 'selected': '')}}>Incompleta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supervisor">Supervisor</label>
                                    <input type="text" class="form-control" id="supervisor" name="supervisor" value="{{$estacion->supervisor}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visible">Visible</label>
                                    <select class="form-select" id="visible" name="visible">
                                        <option value="visible" {{($estacion->visible=="visible" ? 'selected': '')}}>visible</option>
                                        <option value="invisible" {{($estacion->visible=="invisible" ? 'selected': '')}}>invisible</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm ms-auto">Guardar equipo</button>
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
