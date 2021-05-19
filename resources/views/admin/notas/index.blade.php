@extends('admin.layouts.app')

@section('content')

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border">


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
                <strong>Notas</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="row  bg-down-image-border">
            <div class="content container-res-max">
                <div class="col-12">

                    <div class="carousel-item active">
                        <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                            <strong>Notas</strong>
                        </h5>

                        <div class="ml-auto p-2">
                            <a class="btn " data-toggle="modal" data-target="#modalNotas">
                                <i class="fa fa-plus-circle icon-effect-sm" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="row">

                            <div class="carousel-item active">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table text-white">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col">Nota</th>
                                                        <th scope="col">Más</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($notas as $item)
                                                        <tr>
                                                            <td>{{ $item->User->name }}</td>
                                                            <td>{{ $item->nota }}</td>
                                                            <td><button type="button" class="btn text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#modalNotasUpdate{{ $item->id }}"
                                                                    style="background: transparent !important;">
                                                                    Ver más</i>
                                                                </button></td>
                                                            @include('admin.notas.update')
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @include('admin.notas.modal')
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>



@endsection
