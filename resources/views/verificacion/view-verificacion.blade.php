@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-profile" style="z-index: 100000;height: 10vh">

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Verificaci&oacute;n</strong>
            </h5>
        </div>

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

    </div>

    <div class="row bg-image" style="height: 85vh">

        <div class="col-12 mt-1">

            <p class="text-left text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                <strong>Primer Periodo de Verificaci&oacute;n</strong>
            </p>
            <label class="mt-3" for="">
                <p class="text-white"><strong>Placas</strong></p>
            </label>

            <div class="input-group col-6">
                <input type="text" class="form-control" placeholder="arf-515" id="num_placa" name="num_placa"
                    value="{{ $verificacion->Automovil->placas }}" readonly>
            </div>

            <label class="mt-3" for="">
                <p class="text-white"><strong>Primer Periodo</strong></p>
            </label>

            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px">
                    </span>
                </div>
                <input type="date" class="form-control" placeholder="MM/DD/YYY" style="border-radius: 0  10px 10px 0;"
                    id='primer_semestre' name="primer_semestre" value="{{ $verificacion->primer_semestre }}">
            </div>

            <p class="text-left text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                <strong>Segundo Periodo de Verificaci&oacute;n</strong>
            </p>
            @foreach ($verificacion_segunda as $item)

                <label class="mt-3" for="">
                    <p class="text-white"><strong>Primer Periodo</strong></p>
                </label>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px">
                        </span>
                    </div>
                    <input type="date" class="form-control" placeholder="MM/DD/YYY" style="border-radius: 0  10px 10px 0;"
                        id='primer_semestre' name="primer_semestre" value="{{ $item->segundo_semestre }}">
                </div>
            @endforeach


        </div>

    </div>
@endsection
