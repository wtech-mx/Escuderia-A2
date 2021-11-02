@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Orden de Servicio</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="d-flex flex-row-reverse ">
            <a class="btn p-2 " href="{{ route('create.cotizacion') }}">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
            <h5 class="text-white p-2">
                Agregar
            </h5>
        </div>



<div class="col-12">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
        <div class="carousel-inner">

            {{-- -------------------------------------------------------------------------- --}}
            {{-- |Vehculos de user --}}
            {{-- |-------------------------------------------------------------------------- --}}

            <div class="carousel-item active">
                <div class="row">

                    <div class="content container-res-max">
                        <div class="col-12">

                            <table id="seguro" class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cotizacion_servicio as $item)
                                        <tr>
                                            <th>
                                                {{$item->Cotizacion->User->name}}
                                            </th>
                                            <td>{{ $item->Cotizacion->fecha }}</td>
                                            <td>{{ $item->Cotizacion->estatus }}</td>
                                            <td>
                                                <a href="{{ route('edit.diagnostico', $item->id) }}">
                                                    <i class="fas fa-oil-can icon-users-edit" style="margin-right: 10px; font-size: 15px;"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fas fa-tasks icon-users-edit" style="margin-right: 10px; font-size: 15px;"></i>
                                                </a>
                                            </td>


                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
</div>

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#seguro').DataTable();
        });

        $(document).ready(function() {
            $('#seguro_empresa').DataTable();
        });
    </script>

@endsection

@endsection
