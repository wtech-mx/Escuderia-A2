@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style="min-height: 10vh">
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Orden de servicio</strong>
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



       <div class="row  bg-down-image-border" >

                    <div class="col-12  mt-5">

                    <form class="card-details" method="POST" action="{{route('store.cotizacion')}}" enctype="multipart/form-data" role="form">
                        @csrf

                            @if(Session::has('success'))
                                        <script>
                                            Swal.fire({
                                              title: 'Exito!!',
                                              html:
                                                'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                                'Exitosamente',
                                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                                              imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                              background: '#fff',
                                              imageWidth: 150,
                                              imageHeight: 150,
                                              imageAlt: 'USUARIO IMG',
                                            })
                                        </script>
                            @endif

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="" >
                                    <p class="text-white"><strong>Usario</strong></p>
                                </label>

                                <div class="input-group  mb-5">
                                    <select class="form-control usuario" id="id_userco" name="id_userco">
                                        <option value="">Seleccione Cliente</option>
                                       @foreach ($user as $item)
                                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">
                                    <p class="text-white"><strong>Automovil</strong></p>
                                </label>

                                <div class="input-group  mb-5">
                                    <select class="form-control" id="current_autoco" name="current_autoco">
                                        <option value="">seleccione auto</option>
                                        </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">
                                    <p class="text-white"><strong>Fecha</strong></p>
                                </label>

                                <div class="input-group form-group mb-5">
                                    <input type="date" class="form-control" id="fecha" name="fecha">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">
                                    <p class="text-white"><strong>Kilometraje</strong></p>
                                </label>

                                <div class="input-group form-group mb-5">
                                    <input type="number" class="form-control" placeholder="Kilometraje actual" id="km" name="km">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="">
                                <p class="text-white"><strong>Descripción</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <textarea class="form-control" rows="4" cols="50" id="descripcion" name="descripcion"></textarea>
                            </div>

                            <h4 class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Inventario:
                            </h4>

                            <div class="col-6 text-center mt-2" >
                                <label for="">
                                    <p class="text-white"><strong>Video Exterior</strong></p>
                                </label>

                                <input class="form-control" type="file" name="video_exterior">
                            </div>

                            <div class="col-6 text-center mt-2" >
                                <label for="">
                                    <p class="text-white"><strong>Video Interior</strong></p>
                                </label>

                                <input class="form-control" type="file" name="video_interior">
                            </div>

                            <div class="col-6 text-center mt-5" >
                                <div class="row">

                                    <div class="col-12 text-left mt-3 mb-3">

                                        <label class="text-white ml-5" for="">
                                            <strong>Tarjeta C.</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta" value="1">
                                            <label class="form-check-label text-white" for="inlineRadio1">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tarjeta" id="tarjeta" value="2">
                                            <label class="form-check-label text-white" for="inlineRadio1">NO</label>
                                        </div>

                                    </div>

                                    <div class="col-12 text-left mt-3 mb-3">

                                        <label class="text-white ml-5" for="">
                                            <strong>Verificacion</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="verificacion" id="verificacion" value="1">
                                            <label class="form-check-label text-white" for="inlineRadio1">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="verificacion" id="verificacion" value="2">
                                            <label class="form-check-label text-white" for="inlineRadio1">NO</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 text-center mt-5" >
                                <div class="row">

                                    <div class="col-12 text-left mt-3 mb-3">
                                        <label class="text-white ml-5" for="">
                                            <strong>Poliza</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="poliza" id="poliza" value="1">
                                            <label class="form-check-label text-white" for="poliza">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="poliza" id="poliza" value="2">
                                            <label class="form-check-label text-white" for="poliza">NO</label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-left mt-3 mb-3">
                                        <label class="text-white ml-5" for="">
                                            <strong>Manuales</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="manuales" id="manuales" value="1">
                                            <label class="form-check-label text-white" for="manuales">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="manuales" id="manuales" value="2">
                                            <label class="form-check-label text-white" for="manuales">NO</label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                           <div class="col-6 text-center mt-5" >
                                <label for="">
                                    <p class="text-white"><strong>Video Motor</strong></p>
                                </label>
                                <input class="form-control" type="file" name="video_motor">
                            </div>

                           <div class="col-6 text-center mt-5 mb-5" >
                                <label for="">
                                    <p class="text-white"><strong>Video Cajuela</strong></p>
                                </label>
                                <input class="form-control" type="file" name="video_cajuela">
                            </div>

                            <div class="col-12 text-center mt-2 mb-5" style="margin-bottom: 8rem !important;">

                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Guardar
                                </button>
                            </div>

                        </div>

                        </form>
                    </div>
                </div>

    @section('js')
        <script>
            $(document).ready(function () {
                $('#id_userco').on('change', function () {
                    let id = $(this).val();
                    //id_userco no esta en la tabla de automovil
                    $('#current_autoco').empty();
                    $('#current_autoco').append(`<option value="" disabled selected>Procesando..</option>`);
                    $.ajax({
                        type: 'GET',
                        url: 'crear/' + id,
                        success: function (response) {
                            var response = JSON.parse(response);
                            console.log(response);
                            //trae los automoviles relacionados con el id_userco
                            $('#current_autoco').empty();
                            $('#current_autoco').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                            response.forEach(element => {
                                $('#current_autoco').append(`<option value="${element['id']}">${element['placas']}${element['submarca']}</option>`);
                            });
                        }
                    });
                });
            });
        </script>

        <script src="{{ asset('js/select2.full.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.usuario').select2();
            });

        </script>

    @endsection

@endsection
