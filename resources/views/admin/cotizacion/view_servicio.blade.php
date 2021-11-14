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

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="" >
                                    <p class="text-white"><strong>Usario</strong></p>
                                </label>

                                <div class="input-group ">
                                    <p class="text-white"><strong style="color:#00ff37">{{$cotizacion->User->name}}</strong></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="">
                                    <p class="text-white"><strong>Automovil</strong></p>
                                </label>

                                <div class="input-group  mb-5">
                                    <p class="text-white">Submarca: <strong style="color:#00ff37">{{$cotizacion->Automovil->submarca}}</strong> Placa: <strong style="color:#00ff37">{{$cotizacion->Automovil->placas}}</strong></p>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-4">
                                <label for="">
                                    <p class="text-white"><strong>Fecha</strong></p>
                                </label>

                                <div class="input-group form-group mb-5">
                                    <p class="text-white"><strong style="color:#00ff37">{{$cotizacion->fecha}}</strong></p>
                                </div>
                            </div>

                            <div class="col-8">
                                <label for="">
                                    <p class="text-white"><strong>Descripción</strong></p>
                                </label>

                                <div class="input-group form-group mb-5">
                                    <p class="text-white"><strong style="color:#00ff37">{{$cotizacion->descripcion}}</strong></p>
                                </div>
                            </div>

                            <h4 class="text-center  ml-4 mr-4 " style="color:#00ff37;font-weight: bold;">
                                Inventario:
                            </h4>

                            <div class="col-6 text-center mt-2" >
                                <label for="">
                                    <p class="text-white"><strong>Video Exterior</strong></p>
                                </label><br>
                                <video controls preload="auto" width="200" height="150" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('videos/'.$cotizacion->video_exterior)}}" type='video/mp4'>
                                </video>
                            </div>

                            <div class="col-6 text-center mt-2" >
                                <label for="">
                                    <p class="text-white"><strong>Video Interior</strong></p>
                                </label><br>
                                <video controls preload="auto" width="200" height="150" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('videos/'.$cotizacion->video_interior)}}" type='video/mp4'>
                                </video>
                            </div>

                            <div class="col-6 text-center mt-5" >
                                <div class="row">

                                    <div class="col-12 text-left mt-3 mb-3">

                                        <label class="text-white ml-5" for="">
                                            <strong>Tarjeta C.</strong>
                                        </label>

                                            <div class="form-check form-check-inline">
                                                @if ($cotizacion->tarjeta == 1)
                                                <input class="form-check-input" type="radio" checked>
                                                @else
                                                <input class="form-check-input" type="radio" disabled>
                                                @endif
                                                <label class="form-check-label text-white" for="inlineRadio1">SI</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                @if ($cotizacion->tarjeta == 2)
                                                <input class="form-check-input" type="radio" checked>
                                                @else
                                                <input class="form-check-input" type="radio" disabled>
                                                @endif
                                                <label class="form-check-label text-white" for="inlineRadio1">NO</label>
                                            </div>


                                    </div>

                                    <div class="col-12 text-left mt-3 mb-3">

                                        <label class="text-white ml-5" for="">
                                            <strong>Verificacion</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                            @if ($cotizacion->verificacion == 1)
                                            <input class="form-check-input" type="radio" checked>
                                            @else
                                            <input class="form-check-input" type="radio" disabled>
                                            @endif
                                            <label class="form-check-label text-white" for="inlineRadio1">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            @if ($cotizacion->verificacion == 2)
                                            <input class="form-check-input" type="radio" checked>
                                            @else
                                            <input class="form-check-input" type="radio" disabled>
                                            @endif
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
                                            @if ($cotizacion->poliza == 1)
                                            <input class="form-check-input" type="radio" checked>
                                            @else
                                            <input class="form-check-input" type="radio" disabled>
                                            @endif
                                            <label class="form-check-label text-white" for="poliza">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                          @if ($cotizacion->poliza == 2)
                                          <input class="form-check-input" type="radio" checked>
                                          @else
                                          <input class="form-check-input" type="radio" disabled>
                                          @endif
                                          <label class="form-check-label text-white" for="poliza">NO</label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-left mt-3 mb-3">
                                        <label class="text-white ml-5" for="">
                                            <strong>Manuales</strong>
                                        </label>

                                        <div class="form-check form-check-inline">
                                            @if ($cotizacion->manuales == 1)
                                            <input class="form-check-input" type="radio" checked>
                                            @else
                                            <input class="form-check-input" type="radio" disabled>
                                            @endif
                                            <label class="form-check-label text-white" for="manuales">SI</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            @if ($cotizacion->manuales == 2)
                                            <input class="form-check-input" type="radio" checked>
                                            @else
                                            <input class="form-check-input" type="radio" disabled>
                                            @endif
                                            <label class="form-check-label text-white" for="manuales">NO</label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                           <div class="col-6 text-center mt-5" >
                                <label for="">
                                    <p class="text-white"><strong>Video Motor</strong></p>
                                </label><br>
                                <video controls preload="auto" width="200" height="150" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('videos/'.$cotizacion->video_motor)}}" type='video/mp4'>
                                </video>
                            </div>

                           <div class="col-6 text-center mt-5 mb-5" >
                                <label for="">
                                    <p class="text-white"><strong>Video Cajuela</strong></p>
                                </label><br>
                                <video controls preload="auto" width="200" height="150" data-setup="{}" style="padding: 10px;">
                                    <source src="{{asset('videos/'.$cotizacion->video_cajuela)}}" type='video/mp4'>
                                </video>
                            </div>

                            <div class="col-12 text-center mt-2 mb-5">
                                <button class="btn btn-lg btn-save-neon text-white" style="margin-bottom: 8rem !important;">
                                    <i class="fas fa-save icon-tc"></i>
                                    Guardar
                                </button>
                            </div>

                        </div>
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
