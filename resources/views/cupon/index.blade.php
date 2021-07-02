@extends('layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cupones.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row bg-down-image-border">

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Cuponera</strong>
            </h5>
        </div>

        <div class="col-2  mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

    </div>

    <div class="row bg-image" style="height: 85vh">

        <div class="col-12 mt-5">

            <table id="cupones_user" class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">estado</th>
                        <th scope="col">Fecha Caducidad</th>
                        <th scope="col">Ver más</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cupon_user as $item)
                        <tr>
                            <th>
                                {{ $item->titulo }}
                            </th>
                            <td>
                                @if ($item->check == 0)
                                    <p style="color: rgb(33, 243, 14)">
                                        Sin ocupar
                                    </p>
                                @else
                                    <p style="color: rgb(248, 0, 0)">
                                        Ocupado
                                    </p>
                                @endif
                            </td>
                            <td>
                                @php
                                    $DateAndTime = date('Y-m-d', time());
                                @endphp
                                @if ($item->Cupon->fecha_caducidad <= $DateAndTime)
                                <p style="color: rgb(248, 0, 0)">
                                    Caducó
                                </p>
                                @else
                                    {{ $item->Cupon->fecha_caducidad }}
                                @endif
                            </td>
                            <td>
                                @if ($item->Cupon->fecha_caducidad <= $DateAndTime)
                                    <img class="" src="{{ asset('img/icon/white/add.png') }}" width="15px">
                                @else
                                    <a data-toggle="modal" data-target="#example{{ $item->id }}"><img class=""
                                            src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                                @endif

                            </td>
                            @include('cupon.modal')
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    @section('js')
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#cupones_user').DataTable();
            });
        </script>
    @endsection

@endsection

