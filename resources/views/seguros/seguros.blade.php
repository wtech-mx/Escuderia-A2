@extends('layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">


    <div class="row bg-down-image-border">

        @if (Session::has('success'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha agragado el <b>Seguro</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/factura.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Facturas IMG',
                });

            </script>
        @endif

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        @if ($seguro == null)

            @include('view-sin-auto');

        @else
        <div class="col-8 mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Seguro - {{ $seguro->Automovil->placas }} / {{ $seguro->Automovil->Marca->nombre }}</strong>
                {{-- <strong>Seguro - {{$seguro->User->name}}</strong> --}}
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>
        @if ($seguro == null)
            <div class="col-12 p-3">
                <p class="text-center">
                    <img class="d-inline mb-2" src="{{ asset('img/icon/page-not-found.png') }}" alt="Icon documento"
                        width="150px">
                </p>
            </div>
        @else
            <div class="col-12 p-3">
                <p class="text-center">
                    <img class="" src="{{ asset('img/icon/seguros/' . $img) }}" width="100px"><br>
                </p>
            </div>
        @endif



        <?php
            $originalDate = $seguro->end;
            $newDate = date('d/m/Y', strtotime($originalDate));
        ?>

        <form method="POST" action="{{ route('update.seguro', $seguro->id) }}" enctype="multipart/form-data" role="form">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            @if (Session::has('success'))
                <script>
                    Swal.fire(
                        'Exito!',
                        'Se ha guardado exitosamente.',
                        'success'
                    )

                </script>
            @endif

            <div class="row bg-image">
                <div class="col-12 mt-5">

                    <label for="">
                        <p class="text-white"><strong>Seguro</strong></p>
                    </label>

                    {{-- Datos para el calendario --}}
                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='title' name="title"
                            value="{{ $seguro->Automovil->placas }} / {{ $seguro->Automovil->subtipo }}">
                    </div>

                    <input type="hidden" id="device_token" name="device_token" value="">

                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='color' name="color" value="#8E44AD">
                    </div>

                    {{-- Datos para el calendario --}}

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}"
                                    width="25px">
                            </span>
                        </div>

                        <select class="form-control" id="seguro" name="seguro">
                            <option value="{{ $seguro->seguro }}" selected>{{ $seguro->seguro }}</option>
                            <option value="aba">aba</option>
                            <option value="afirme">afirme</option>
                            <option value="aig">aig</option>
                            <option value="ana">ana</option>
                            <option value="atlas">atlas</option>
                            <option value="axa">axa</option>
                            <option value="banorte">banorte</option>
                            <option value="general">general</option>
                            <option value="sura">sura</option>
                            <option value="vexmas">vexmas</option>
                            <option value="gnp">gnp</option>
                            <option value="hdi">hdi</option>
                            <option value="inbursa">inbursa</option>
                            <option value="latino">latino</option>
                            <option value="mapfre">mapfre</option>
                            <option value="qualitas">qualitas</option>
                            <option value="potosi">potosi</option>
                            <option value="miituo">miituo</option>
                            <option value="zurich">zurich</option>
                        </select>

                    </div>

                    <label for="">
                        <p class="text-white"><strong>Fecha de expedici&oacute;n</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="MM/DD/YYY"
                            style="border-radius: 0  10px 10px 0;" id='fecha_expedicion' name="fecha_expedicion"
                            value="{{ $seguro->fecha_expedicion }}">
                    </div>
                    <input type="hidden" class="form-control" id='image' name="image"
                        value="{{ asset('img/icon/color/comprobado.png') }}">
                    <label for="">
                        <p class="text-white"><strong>Fecha de Vencimiento</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="MM/DD/YYY"
                            style="border-radius: 0  10px 10px 0;" id="end" name="end" value="{{ $seguro->end }}">
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Tipo Cobertura</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}"
                                    width="25px">
                            </span>
                        </div>

                        <select class="form-control" id="tipo_cobertura" name="tipo_cobertura">
                            <option value="{{ $seguro->tipo_cobertura }}" selected>{{ $seguro->tipo_cobertura }}
                            </option>
                            <option value="Amplia">Ampl&iacute;a</option>
                            <option value="Limitada">Limitada</option>
                        </select>
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Costo</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;"
                            id='costo' name="costo" value="{{ $seguro->costo }}">
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Costo anual</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/presupuesto (1).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="$0000" style="border-radius: 0  10px 10px 0;"
                            id='costo_anual' name="costo_anual" value="{{ $seguro->costo_anual }}">
                    </div>

                    {{-- <label for="">
                        <p class="text-white mt-3"><strong>Foto P&oacute;liza Seguro</strong></p>
                    </label>

                    <div class="col-12 text-center">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalpoliza"
                            style="background: transparent !important;">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/boton-circular-plus.png') }}"
                                width="50px">
                        </button>
                    </div> --}}


                </div>

                <div class="col-12 text-center mt-2 " style="margin-bottom: 8rem !important;">
                    <button class="btn btn-lg btn-save-neon text-white">
                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                        Actualizar
                    </button>
                </div>

            </div>
        </form>
    @endif

    {{-- <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            /* These examples are all valid */
            OneSignal.getUserId(function(userId) {
                var UserID;
                UserID = userId;
                document.getElementById("device_token").value = UserID;
                console.log("OneSignal User ID:", UserID);
            });
        });

    </script> --}}

    <div class="modal-cambio-car">
        <button type="button" class="btn btn-primary cambio-carro" data-toggle="modal" data-target="#cambio-car">
          Cambiar auto
        </button>
    </div>

@include('layouts.change-car')

@endsection
