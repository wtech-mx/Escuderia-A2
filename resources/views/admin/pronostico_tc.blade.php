@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

@section('css')
    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/container-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Exito!!',
                html: 'Se ha actualizado tu  <b>Licencia de Conducir</b>, ' +
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
                <strong>Pronostico Tarjeta de Circulacion</strong>
            </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


    <form method="POST" action="{{ route('store.pronostico_tc') }}" enctype="multipart/form-data"
        role="form">

        @csrf
        <div class="row bg-image">
            <div class="col-12 mt-3">

                <div class="input-group form-group">

                    <input type="hidden" class="form-control" id='image' name="image"
                        value="{{ asset('img/icon/color/comprobado.png') }}">

                    <label for="" class="mt-5">
                        <p class="text-white"><strong>Usuario</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-user icon-tc"></i>
                            </span>
                        </div>

                        <select class="col-10 js-example-basic-single" id="id_user" name="id_user">
                            <option value="">Seleccione usuario</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <label for="" class="mt-5">
                        <p class="text-white"><strong>Veh&iacute;culo</strong></p>
                    </label>

                   <div class="input-group form-group">
                       <div class="input-group-prepend " >
                           <span class="input-group-text input-services" >
                                <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                           </span>
                       </div>

                       <select class="form-control" id="current_auto" name="current_auto">
                         <option value="">seleccione auto</option>
                       </select>
                   </div>

                    <label for="" class="mt-5">
                        <p class="text-white"><strong>Descripcion</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/contrato.png') }}" width="25px" >
                            </span>
                        </div>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="2"></textarea>
                    </div>

                    <label for="" class="mt-5">
                        <p class="text-white"><strong>Fecha de pronostico</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="far fa-calendar-minus icon-tc"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="MM/DD/YYY"
                        style="border-radius: 0  10px 10px 0;" id='end' name="end">
                    </div>


                    <div class="col-12 text-center mt-5" style="margin-bottom: 8rem !important;">
                        <button class="btn btn-lg btn-save-neon text-white">
                            <i class="fas fa-save icon-tc"></i>
                            Guardar
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <script>
            $(document).ready(function () {
            $('#id_user').on('change', function () {
            let id = $(this).val();
            //id_user no esta en la tabla de automovil
            $('#current_auto').empty();
            $('#current_auto').append(`<option value="" disabled selected>Procesando..</option>`);
            $.ajax({
            type: 'GET',
            url: 'crear/' + id,
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);
            //trae los automoviles relacionados con el id_user
            $('#current_auto').empty();
            $('#current_auto').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
            response.forEach(element => {
                $('#current_auto').append(`<option value="${element['placas']}">${element['placas']} / ${element['submarca']} / ${element['año']}</option>`);
                });
            }
        });
    });
    });
    </script>

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

