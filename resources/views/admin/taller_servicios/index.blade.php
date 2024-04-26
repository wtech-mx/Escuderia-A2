@extends('admin.layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

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
                <strong>Servicios para cotización</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <form action="{{ route('import.taller.servicios') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit">Importar</button>
        </form>

        <a data-toggle="modal" data-target="#modal-taller-cot">
            Agregar<i class="fas fa-plus-circle icon-effect"></i>
        </a>

        <div class="row  bg-down-image-border">
            <div class="col-12">
                <table id="servicio" class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Servicio</th>
                            <th scope="col">precio</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $item)
                            <tr>
                                <td>{{ $item->servicio }}</td>
                                <td>${{ $item->precio }}.00</td>
                                 <td>
                                    <a style="color: #3490dc" data-toggle="modal" data-target="#servicio-{{ $item->id }}">Edit</a>
                                </td>
                            </tr>
                            @include('admin.taller_servicios.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.taller_servicios.create')
@endsection

@section('js')

@endsection
