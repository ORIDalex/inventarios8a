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
                            <a href="{{route('create-campania')}}">
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
                                            Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Descripción</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Extensiones</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Direccion</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Estado</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($campanias as $campania)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$campania->nombre}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$campania->descripcion}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$campania->extensiones}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$campania->direccion}}</p>
                                        </td>   
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-{{($campania->estado== "habilitada") ? "success" : "secondary"}}">{{$campania->estado}}</span>
                                        </td>
                                        <td class="align-middle px-2">
                                            <form action="{{ route('edit-campania') }}" method="get" enctype="multipart/form-data">
                                                <button type="submit" class="btn btn-sm">Editar</button>
                                                <input type="hidden" id="id" name="id" value="{{$campania->id}}"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td class="align-middle">
                                            {{$campanias->links()}}
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
