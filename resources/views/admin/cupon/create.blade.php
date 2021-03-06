@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-profile" style="z-index: 100000">


        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.cupon') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Cupon </strong>
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

    <div class="row  bg-down-image-border" >
        <div class="col-12 mt-5">
            <form method="POST" action="{{ route('store_admin.cupon') }}" enctype="multipart/form-data" role="form">
            @csrf

                            <label for="">
                                <p class="text-white"><strong>Titulo</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
                           </div>

                            <label for="">
                                <p class="text-white"><strong>Oferta o Precio</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio $">
                            </div>

                            <label for="">
                                <p class="text-white"><strong>Color</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="color" class="form-control" name="color" id="color"value="#563d7c">

                           </div>

                            <label for="">
                                <p class="text-white"><strong>Terminos</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-signature icon-tc"></i>
                                    </span>
                                </div>

                                <input type="text" class="form-control" name="aplicacion" id="aplicacion" placeholder="Aplica en la compra...">
                            </div>

                           <label for="">
                                <p class="text-white"><strong>Fecha limite</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                            <i class="far fa-calendar-alt icon-tc"></i>
                                    </span>
                                </div>
                                    <input type="date" class="form-control" name="fecha_caducidad" id="fecha_caducidad" placeholder="MM/YYYY">
                            </div>


                    <div class="col-12 mt-5">
                        <button class="btn btn-lg btn-success btn-save-neon text-white"
                            style="margin-bottom: 15rem !important;">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>

            </form>
        </div>
    </div>
@endsection


