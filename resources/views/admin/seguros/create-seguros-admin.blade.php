@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-profile" style="z-index: 100000">
        @include('admin.seguros.modal-poladmin-img')
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
                })

            </script>
        @endif

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.seguros') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Seguro - </strong>
            </h5>
        </div>

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12 p-3">
            <p class="text-center">
                <img class="" src="{{ asset('img/icon/seguros/' . $img) }}" width="150px"><br>
            </p>
        </div>

    </div>

    <form method="POST" action="{{ route('update_admin.seguro', $seguro->id) }}" enctype="multipart/form-data"
        role="form">

        @csrf
        <input type="hidden" name="_method" value="PATCH">
        @if (Session::has('success2'))
            <script>
                Swal.fire(
                    'Exito!',
                    'Se ha guardado exitosamiente.',
                    'success'
                )

            </script>
        @endif

        <div class="row bg-image">
            <div class="col-12 mt-3">

                <p class="text-center text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                    <strong>Detalles del Seguro</strong>
                </p>

                <p class="text-center" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$seguro->User->name}} / {{$seguro->Automovil->placas}}</strong></p>

                <label for="">
                    <p class="text-white"><strong>Seguro</strong></p>
                </label>

                {{-- Datos para el calendario --}}
                <div class="input-group form-group">
                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='title' name="title"
                            value="{{ $seguro->Automovil->placas }} / {{ $seguro->Automovil->submarca }}">
                    </div>

                    <div class="input-group form-group">
                        <input type="hidden" class="form-control" id='color' name="color" value="#8E44AD">
                    </div>

                    <input type="hidden" class="form-control" id='image' name="image"
                        value="{{ asset('img/icon/color/comprobado.png') }}">
                    {{-- Datos para el calendario --}}

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="fas fa-shield-alt icon-tc"></i>
                            </span>
                        </div>

                        <select class="form-control js-example-basic-single" id="seguro" name="seguro">
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

                    <label for="" class="mt-3">
                        <p class="text-white"><strong>Fecha de expedici&oacute;n</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-plus icon-tc"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="MM/DD/YYY"
                            style="border-radius: 0  10px 10px 0;" id='fecha_expedicion' name="fecha_expedicion"
                            value="{{ $seguro->fecha_expedicion }}">
                    </div>

                    <label for="" class="mt-3">
                        <p class="text-white"><strong>Fecha de Vencimiento</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-minus icon-tc"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="MM/DD/YYY"
                            style="border-radius: 0  10px 10px 0;" id='end' name="end" value="{{ $seguro->end }}">
                    </div>

                    <label for="" class="mt-3">
                        <p class="text-white"><strong>Tipo Cobertura</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="fas fa-shield-alt icon-tc"></i>
                            </span>
                        </div>

                        <select class="form-control" id="tipo_cobertura" name="tipo_cobertura">
                            <option value="{{ $seguro->tipo_cobertura }}" selected>{{ $seguro->tipo_cobertura }}
                            </option>
                            <option value="Amplia">Ampl&iacute;a</option>
                            <option value="Limitada">Limitada</option>
                        </select>
                    </div>

                    <label for="" class="mt-3">
                        <p class="text-white"><strong>Costo</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="fas fa-dollar-sign icon-tc"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;"
                            id='costo' name="costo" value="{{ $seguro->costo }}">
                    </div>

                    <label for="" class="mt-3">
                        <p class="text-white"><strong>Costo anual</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="fas fa-money-bill-alt icon-tc"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control" placeholder="$0000" style="border-radius: 0  10px 10px 0;"
                            id='costo_anual' name="costo_anual" value="{{ $seguro->costo_anual }}">
                    </div>

                    <label for="" class="mt-3">
                        <p class="text-white mt-3"><strong>Foto P&oacute;liza Seguro</strong></p>
                    </label>

                    <div class="col-12 text-center">
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalpoliza"
                            style="background: transparent !important;">
                            <i class="fas fa-plus-circle icon-tc-r"></i>
                        </button>
                    </div>

                    <div class="col-12 text-center mt-3 " style="margin-bottom: 8rem !important;">
                        <button class="btn btn-lg btn-save-neon text-white">
                            <i class="fas fa-save icon-tc"></i>
                            Actualizar
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </form>
@section('js')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

@endsection
@endsection
