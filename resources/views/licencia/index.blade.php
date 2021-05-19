@extends('layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/container-responsive.css') }}" rel="stylesheet">

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

        <div class="col-8 mt-5">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Licencia de conducir</strong>
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

    </div>


    <div class="row bg-down-image-border">



        <div class="col-6 text-center" style="margin-top: 9rem !important;margin-bottom: 10%;">
            <img class="img-fluid"
                src="https://img-premium.flaticon.com/png/512/3135/3135715.png?token=exp=1621441372~hmac=1c426124fde0b0190975c277496448ef"
                width="90px" heigth="90px">
        </div>

        <div class="col-6 text-center" style="margin-top: 9rem !important;">
            <img class="img-fluid"
                src="https://img-premium.flaticon.com/png/512/3135/3135715.png?token=exp=1621441372~hmac=1c426124fde0b0190975c277496448ef"
                width="90px" heigth="90px">
            <p class="text-white mt-3">
                <strong style="color:#00f936">
                    Licencia No:
                </strong><br>
                <input type="text" class="form-control" id="">
            </p>
        </div>

        <div class="col-12 text-center mt-5 mb-5">
            <h2 class="" style="color:#00f936"> Nombre </h2>
        </div>

        <div class="col-12 text-center" style="margin-bottom: 30%;">
            <div class="d-flex justify-content-around">

                <style>
                    input.form-control {
                        display: block;
                        width: 100%;
                        padding: 0.375rem 0.75rem;
                        font-size: 0.9rem;
                        font-weight: 400;
                        line-height: 1.6;
                        color: #fff;
                        background-color: transparent !important;
                        background-clip: padding-box;
                        border: 0px solid #fff;
                    }

                    input:after {
                        color: #fff;
                    }

                </style>

                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">Antiguedad</p>
                    <input type="date" class="form-control" id="">
                </div>

                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">Expedicion</p>
                    <input type="date" class="form-control" id="">
                </div>

                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">Vigencia</p>
                    <input type="date" class="form-control" id="">
                </div>

            </div>
        </div>

        <div class="col-12 text-center" style="margin-bottom: 50%;">
            <div class="d-flex justify-content-around">
                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">Nacionalidad</p>
                    <input type="text" class="form-control" id="">
                </div>

                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">Tipo de sangre</p>
                    <input type="text" class="form-control" id="">
                    <p>
                </div>

                <div class="conten-datos">
                    <p class="mb-3" style="color:#00f936">RFC --</p>
                    <input type="text" class="form-control" id="">
                </div>

            </div>
        </div>



    </div>




@endsection
