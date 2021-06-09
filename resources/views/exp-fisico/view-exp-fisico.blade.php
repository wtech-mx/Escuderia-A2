@extends('layouts.app')

@section('content')

    <div class="row bg-down-blue" style="border-radius: 0 0 0 0;">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>
        <p style="display: none">{{ $userId = auth()->user() }}</p>
        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong> Expedientes F&iacute;sicos</strong>
            </h5>
            <p class="text-center" style="color: rgb(94, 226, 41)">{{ $userId->Automovil->placas }} /
                {{ $userId->Automovil->Marca->nombre }}</p>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-whittext-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


        @if ($automovil->count())
            <div class="row" style="height: 140vh;">

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-factura') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Facturas {{ $factura }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-tenencias') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Tenencias {{ $tenencias }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-cr') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Carta Responsiva/ Identificaci&oacute;n {{ $carta }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-poliza') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Póliza de Seguro {{ $poliza }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-tc') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Copia de tarjeta de circulaci&oacute;n {{ $tc }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-reemplacamiento') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Reemplacamiento {{ $reemplacamiento }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-certificado') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Certificado Verificación {{ $certificado }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-bp') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Baja de placas {{ $placas }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-ine') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        INE {{ $ine }}
                    </p>
                </div>

                <div class="col-6 mt-5">
                    <p class="text-center">
                        <a href="{{ route('index.exp-cd') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        Comprobante de domicilio {{ $comprobante }}
                    </p>
                </div>

                <div class="col-6 mt-5" style="margin-bottom: 6rem !important;">
                    <p class="text-center">
                        <a href="{{ route('index.exp-rfc') }}">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                alt="Icon boton-circular-plus" width="30px">
                        </a>
                    </p>
                    <p class="text-center text-white">
                        RFC {{ $rfc }}
                    </p>
                </div>

            </div>
        @else
            <div class="row overflow-hidden" style="height: 85vh;">

                <div class="col-12 mt-5">
                    <p class="text-center title-car">
                        <img class="d-inline mb-2" src="{{ asset('img/icon/white/coche (7).png') }}" alt="Icon documento"
                            width="150px">

                    </p>
                    <p class="text-center  text-white">
                        <strong style="font: normal normal bold 20px/20px Segoe UI;">A&uacute;n no tienes Expedientes!
                        </strong><br>
                        <br> Cree un Auto para generar sus Expedientes <br>
                        <br> click en el botón de + para <br> agregar tu Auto
                    </p>

                    <p class="text-center">
                        <a class="btn " href="{{ route('create.automovil') }}">
                            <img class="d-inline" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento"
                                width="60px">
                        </a>
                    </p>
                </div>

            </div>
        @endif

    </div>

@endsection
