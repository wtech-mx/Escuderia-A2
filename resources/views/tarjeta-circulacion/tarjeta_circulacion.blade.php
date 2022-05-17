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
                    html: 'Se ha actualizado tu  <b>Tarjeta de Circulación</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'USUARIO IMG',
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

        @if ($tarjeta_circulacion == null)
             @include('view-sin-auto');
        @else

        <div class="col-8 mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Tarjeta de Circulaci&oacute;n {{ $tarjeta_circulacion->Automovil->placas }} /
                    {{ $tarjeta_circulacion->Automovil->Marca->nombre }}</strong>
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


            @php
                $originalDate = $tarjeta_circulacion->end;
                $newDate = date('d/m/Y', strtotime($originalDate));
            @endphp

            <div class="col-12">


                <div class="modal-cambio-car">
                    <button type="button" class="btn btn-primary cambio-carro" data-toggle="modal" data-target="#cambio-car">
                      Cambiar auto
                    </button>
                </div>

                <form class="card-details" method="POST" action="{{ route('update.tc', $tarjeta_circulacion->id) }}"
                    enctype="multipart/form-data" role="form">

                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    {{-- Datos para el calendario --}}
                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='title' name="title"
                            value="{{ $tarjeta_circulacion->Automovil->placas }} / {{ $tarjeta_circulacion->Automovil->subtipo }}">
                    </div>

                    <input type="hidden" id="device_token" name="device_token" value="">

                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='color' name="color" value="#F1C40F">
                    </div>

                    <input type="hidden" class="form-control" id='image' name="image"
                        value="{{ asset('img/icon/color/comprobado.png') }}">
                    {{-- Datos para el calendario --}}

                    <div class="row">
                        <div class="col-6">
                            <label for="">
                                <p class="text-white"><strong>Marca</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px">
                                    </span>
                                </div>

                                <input type="text" class="form-control"
                                    value="{{ $tarjeta_circulacion->Automovil->Marca->nombre }}" readonly>
                            </div>

                        </div>

                        <div class="col-6">
                            <label for="">
                                <p class="text-white"><strong>Submarca</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/car-service (1).png') }}"
                                            width="25px">
                                    </span>
                                </div>
                                <input type="text" class="form-control"
                                    value="{{ $tarjeta_circulacion->Automovil->submarca }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="">
                                <p class="text-white"><strong>Placa</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/placa.png') }}" width="25px">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="num_placa" name="num_placa"
                                    value="{{ $tarjeta_circulacion->Automovil->placas }}" readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="">
                                <p class="text-white"><strong>Últimos dígito placa</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/numeros.png') }}" width="25px">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="num_placa" name="num_placa"
                                    value="{{ $tarjeta_circulacion->num_placa }}" required>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-3 mb-3" style="border: 1px solid #00f936;opacity: 1">

                    <label for="">
                        <p class="text-white"><strong>Nombre de la tarjeta de Circulación</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Nombre de la tarjeta de Circulación" value="{{ $tarjeta_circulacion->nombre }}"
                            required>
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Tipo placa</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}"
                                    width="25px">
                            </span>
                        </div>

                        <select class="form-control" id="tipo_placa" name="tipo_placa" required>
                            <option value="{{ $tarjeta_circulacion->tipo_placa }}" selected>
                                {{ $tarjeta_circulacion->tipo_placa }}</option>
                            <option value="Particular">Particular</option>
                            <option value="Carga">Carga</option>
                            <option value="Hybrido">Hybrido</option>
                            <option value="Electrico">Electrico</option>
                            <option value="Discapacidad">Discapacidad</option>
                            <option value="Ambulancia">Ambulancia</option>
                            <option value="Patrulla">Patrulla</option>
                            <option value="Escolta">Escolta</option>
                            <option value="Auto Antiguo">Auto Antiguo</option>
                        </select>
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Lugar expedici&oacute;n</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}"
                                    width="25px">
                            </span>
                        </div>
                        <select class="form-control" id="lugar_expedicion" name="lugar_expedicion" required>
                            <option value="{{ $tarjeta_circulacion->lugar_expedicion }}" selected>
                                {{ $tarjeta_circulacion->lugar_expedicion }}</option>
                            @include('tarjeta-circulacion.estados')
                        </select>
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Fecha de emisión</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="date" class="form-control" name="fecha_emision" id="fecha_emision"
                            placeholder="MM/YYYY" value="{{ $tarjeta_circulacion->fecha_emision }}" required>
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Fecha de vencimiento</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px">
                            </span>
                        </div>
                        <input type="date" class="form-control" name="end" id="end" placeholder="MM/YYYY"
                            value="{{ $tarjeta_circulacion->end }}" required>
                    </div>

                    {{-- <label for="">
                        <p class="text-white mt-3"><strong>Agregar imagen</strong></p>
                    </label>

                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-center">
                            <a type="button" class="btn ml-5" data-toggle="modal" data-target="#exampleModal">
                                <img class="d-inline mb-2" src="{{ asset('img/icon/white/add.png') }}" width="30px">
                            </a>
                        </div>
                    </div> --}}

                    <div class="col-12 text-center mt-5" style="margin-bottom: 8rem !important;">
                        <button class="btn btn-lg btn-save-neon text-white">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Actualizar
                        </button>
                    </div>

                </form>
            </div>
        @endif

    </div>

    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            /* These examples are all valid */
            OneSignal.getUserId(function(userId) {
                var UserID;
                UserID = userId;
                document.getElementById("device_token").value = UserID;
                console.log("OneSignal User ID TC:", UserID);
            });
        });

    </script>



@include('layouts.change-car')
@endsection
