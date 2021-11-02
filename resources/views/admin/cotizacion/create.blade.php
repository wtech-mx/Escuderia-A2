@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style=" min-height: 10vh">
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

                            <label for="" >
                                <p class="text-white"><strong>Usario</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <select class="col-12 usuario" id="id_userco" name="id_userco">
                                    <option value="">Seleccione Cliente</option>
                                   @foreach ($user as $item)
                                       <option value="{{ $item->id }}">{{ $item->name }}</option>
                                   @endforeach
                               </select>
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Automovil</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <select class="form-control" id="current_autoco" name="current_autoco">
                                    <option value="">seleccione auto</option>
                                    </select>
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Fecha</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Descripción</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <textarea class="form-control" rows="4" cols="50" id="descripcion" name="descripcion"></textarea>
                            </div>

                            <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Guardar
                                </button>
                            </div>

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

                        </form>
                    </div>
                </div>

    @section('js')
        <script src="{{ asset('js/select2.full.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.usuario').select2();
            });
        </script>

    @endsection

@endsection
