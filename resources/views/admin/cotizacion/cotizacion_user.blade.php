@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="bg-down-image-border" style=" min-height: 10vh">
            <div class="row">
                <div class="col-2 mt-5">
                    <div class="d-flex justify-content-start">
                            <div class="text-center text-white">
                                @if (Auth::check() == true)
                                    @if (auth()->user()->role != 0)
                                        <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    @else
                                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    @endif
                                @endif
                            </div>
                    </div>
                </div>

                <div class="col-8 mt-5">
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>Cotizacion Diagnostico</strong>
                            </h5>
                </div>

                <div class="col-2 mt-5">
                    <div class="d-flex justify-content-start">
                            <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                            </div>
                    </div>
                </div>
            </div>

        </div>

                <div class="row  bg-down-image-border" >
                    <div class="col-12  mt-5">


                        <table class="table table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th>Servicio</th>
                                    <th>Cant.</th>
                                    <th>Mano de Obra</th>
                                    <th>Importe</th>
                                </tr>
                            <thead>
                            <tbody>
                                @foreach ($taller as $item)
                                <tr>
                                    <td>{{$item->refaccion}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>{{$item->importe_unitario}}</td>
                                    <td>{{$item->importe_total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
