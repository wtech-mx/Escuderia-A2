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


        @if ($cupon_user->count())
        @foreach ($cupon_user as $item)

             <div class="col-6 mt-3 mb-3">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex card text-center position-relative" style="padding: 3px;height: 380px;background: {{ $item->Cupon->color }}">

                                @if ($item->check == 1)
                                   <img class="position-absolute" src="{{ asset('img/icon/color/utilizado.png') }}" width="130" style="top:40%">
                                @endif
                                @php
                                    $DateAndTime = date('Y-m-d', time());
                                @endphp
                                @if ($item->Cupon->fecha_caducidad <= $DateAndTime)
                                   <img class="position-absolute" src="{{ asset('img/icon/color/expirado.png') }}" width="130" style="top:40%">
                                @endif

                                    <div class="content-cupon p-3 bg-white" style="border-radius: 20px">
                                        <img class="" src="{{ asset('qr/' . $item->Cupon->qr) }}"
                                            alt="{{ asset('img/qr/' . $item->Cupon->qr) }}" width="65">
                                    </div>

                                    <h1 class="mt-3" style="font-size: 20px;">
                                        <strong> {{ $item->Cupon->precio }} </strong>
                                    </h1>

                                    <h2 class="mt-3" style="font-size: 10px">
                                        <strong> {{ $item->Cupon->titulo }} </strong>
                                    </h2>

                                    <div class="mt-4">
                                        @php
                                            $fecha_actual = date('Y-m-d');
                                            $s = strtotime($item->Cupon->fecha_caducidad) - strtotime($fecha_actual);
                                            $d = intval($s / 86400);
                                        @endphp
                                        <h3>{{ $d }} Dias Restantes</h3>
                                    </div>

                                    <div class="mt-4">
                                        <small> Terminos y/o condiciones : <br> <strong> {{ $item->Cupon->aplicacion }}
                                            </strong>
                                        </small>
                                    </div>

                                </div>
                            </div>
             </div>
        @endforeach

            @else

                @include('cupon.view-sin-cupon');

        @endif

    </div>


@endsection

