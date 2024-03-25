@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Estaciones'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Estaciones</h6>
                        <span class="badge badge-sm bg-gradient-success">
                            <a href="{{route('estaciones-create')}}">
                                Crear
                            </a>
                        </span>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            equipos_id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            nodo</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            piso</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            campanias_id</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            estado</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            supervisor</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            visible</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($estaciones as $estacion)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$estacion->equipos_id}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$estacion->nodo}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$estacion->piso}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$estacion->campanias_id}}</p>
                                        </td> 
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$estacion->estado}}</p>
                                        </td> 
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$estacion->supervisor}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-{{($estacion->visible== "visible") ? "success" : "secondary"}}">{{$estacion->visible}}</span>
                                        </td>
                                        <td class="align-middle px-2">
                                            <form action="{{ route('estacion-edit') }}" method="get" enctype="multipart/form-data">
                                                <button type="submit" class="btn btn-sm">Editar</button>
                                                <input type="hidden" id="id" name="id" value="{{$estacion->id}}"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td class="align-middle">
                                            {{$estaciones->links()}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
