@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/roles.css') }}" rel="stylesheet">

    <div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_role.role') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8 mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Role y Permisos </strong>
            </h5>
        </div>

        <div class="col-2 mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


        <div class="content container-res-max">
            <div class="col-12 mt-5">
                <form method="POST" action="{{ route('store_role.role') }}" enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="row">
                        <div class="col-12" style="padding: 0rem 3rem 0rem 3rem;">
                            <label for="">
                                <p class="text-white"><strong>Nombre</strong></p>
                            </label>

                            <div class="input-group form-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-users-cog icon-tc"></i>
                                    </span>
                                </div>

                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del Role">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">

                            <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel" data-interval="60000">

                              <div class="contendor-tab">
                                    <div id="main-menu" class="list-group">
                                        <a href="#" class="list-group-item">
                                           <i data-target="#carouselExampleIndicators" data-slide-to="0"  class="active fas fa-calendar-alt icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                           <i data-target="#carouselExampleIndicators" data-slide-to="1"  class="fas fa-users icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="2" class="fas fa-car icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="3" class="fas fa-cogs icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="4" class="fas fa-shield-alt icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="5" class="fas fa-money-check icon-effect-roles-drupdwn"></i>
                                        </a>
                                    </div>
                              </div>

                              <div class="contendor-tab-2">
                                    <div id="main-menu" class="list-group">
                                        <a href="#" class="list-group-item">
                                           <i data-target="#carouselExampleIndicators" data-slide-to="6"  class="fas fa-folder-open icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                           <i data-target="#carouselExampleIndicators" data-slide-to="7"  class="fas fa-building  icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="8" class="fas fa-calendar-check icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="9" class="fas fa-qrcode  icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="10" class="fas fa-sticky-note icon-effect-roles-drupdwn"></i>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="11" class="fas fa-id-badge icon-effect-roles-drupdwn"></i>
                                        </a>
                                       <a href="#" class="list-group-item">
                                            <i data-target="#carouselExampleIndicators" data-slide-to="12" class="fas fa-users-cog icon-effect-roles-drupdwn"></i>
                                        </a>
                                    </div>
                              </div>

                              <div class="arrow-conetn" style="">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="circular-arrow">
                                                      <a class="" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                          <i class="fas fa-arrow-left icon-effect-roles-arrow"></i>
                                                       </a>
                                                    </div>
                                                    <a class="circular-arrow" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                       <i class="fas fa-arrow-right icon-effect-roles-arrow"></i>
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                </div>

                              <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-calendar-alt icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Calendario</stromg>
                                                             <input class="form-check-input" type="checkbox" onclick="toggle(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="19" id="calendario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="20" id="calendario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Editar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="21"  id="calendario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="22"  id="calendario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                     <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-users icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Usuarios</stromg>
                                                             <input class="form-check-input" type="checkbox" onclick="toggle2(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="23"  id="usuario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="24"  id="usuario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Editar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="25"  id="usuario" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-car icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Automovil</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle3(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="26"
                                    id="automovil" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                  <input class="form-check-input" type="checkbox" name="permission[]" value="27"
                                    id="automovil" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Editar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="28"
                                    id="automovil" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-cogs icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Servicios</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle4(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="29"
                                    id="servicio" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                  <input class="form-check-input" type="checkbox" name="permission[]" value="30"
                                    id="servicio" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                  {{-- <input class="form-check-input" type="checkbox" name="permission[]" value="57" id="servicio" /> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-shield-alt icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Seguro</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle5(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="36"
                                    id="seguro" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Editar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="37"
                                    id="seguro" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-money-check icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Tarjeta C</stromg>
                                                             <input class="form-check-input" type="checkbox" onclick="toggle6(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="31"
                                    id="tarjeta" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Editar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="32"
                                    id="tarjeta" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-folder-open icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Expedientes F.</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle7(this);" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="33"
                                    id="expediente" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="34"
                                    id="expediente" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="35"
                                    id="expediente" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-building icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Empresas</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle8(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="38"
                                    id="empresa" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                               <input class="form-check-input" type="checkbox" name="permission[]" value="39"
                                    id="empresa" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="40"
                                    id="empresa" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-calendar-check icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Verificacion</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle9(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="41"
                                    id="verificacion" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="42"
                                    id="verificacion" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">-</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-qrcode icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Cupones</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle10(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                 <input class="form-check-input" type="checkbox" name="permission[]" value="49"
                                    id="cupon" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="50"
                                    id="cupon" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="51"
                                    id="cupon" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="52"
                                    id="cupon" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-sticky-note icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Nota</stromg>
                                                           <input class="form-check-input" type="checkbox" onclick="toggle11(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                  <input class="form-check-input" type="checkbox" name="permission[]" value="45"
                                    id="nota" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                <input class="form-check-input" type="checkbox" name="permission[]" value="46"
                                    id="nota" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                               <input class="form-check-input" type="checkbox" name="permission[]" value="47"
                                    id="nota" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                               <input class="form-check-input" type="checkbox" name="permission[]" value="48"
                                    id="nota" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="far fa-id-badge icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Licencia C.</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle12(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                                   <input class="form-check-input" type="checkbox" name="permission[]" value="43"
                                    id="licencia" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">
                                                               <input class="form-check-input" type="checkbox" name="permission[]" value="44"
                                    id="licencia" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="container d-flex justify-content-center">
                                        <figure class="card-permisos card-product-grid card-lg">
                                            <a href="#" class="img-wrap" data-abc="true">
                                                <i class="fas fa-users-cog icon-effect-roles"></i>
                                            </a>

                                            <figcaption class="info-wrap">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <a href="#" class="title text-center mt-4" data-abc="true">
                                                            <stromg style="">Roles y Permisos</stromg>
                                                            <input class="form-check-input" type="checkbox" onclick="toggle12(this);" />

                                                        </a>
                                                    </div>
                                                </div>
                                            </figcaption>

                                            <div class="bottom-wrap-payment">
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Ver</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">Crear</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                            <a href="#" class="title" data-abc="true">
                                                                Editar
                                                            </a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                                <figcaption class="info-wrap">
                                                    <div class="row text-center">
                                                        <div class="col-6 ">
                                                             <a href="#" class="title" data-abc="true">Eliminar</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="rating text-right">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        </figure>
                                    </div>
                                </div>

                              </div>

                            </div>

                        </div>
                    </div>

                <div class="row">
                    <div class="col-12" style="padding: 3rem 3rem 0rem 3rem;">
                        <button class="btn btn-lg btn-success btn-save-neon text-white"
                            style="border-radius: 30px">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

<script>
// ================================== Primer Bloque===================================
    function toggle(source) {
        var checkboxes = document.querySelectorAll('input[id="calendario"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle2(source) {
        var checkboxes = document.querySelectorAll('input[id="usuario"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle3(source) {
        var checkboxes = document.querySelectorAll('input[id="automovil"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Segundo Bloque===================================
    function toggle4(source) {
        var checkboxes = document.querySelectorAll('input[id="servicio"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle5(source) {
        var checkboxes = document.querySelectorAll('input[id="seguro"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle6(source) {
        var checkboxes = document.querySelectorAll('input[id="tarjeta"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Tercer Bloque===================================
    function toggle7(source) {
        var checkboxes = document.querySelectorAll('input[id="expediente"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle8(source) {
        var checkboxes = document.querySelectorAll('input[id="empresa"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle9(source) {
        var checkboxes = document.querySelectorAll('input[id="verificacion"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Cuarto Bloque===================================
function toggle10(source) {
        var checkboxes = document.querySelectorAll('input[id="cupon"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle11(source) {
        var checkboxes = document.querySelectorAll('input[id="nota"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle12(source) {
        var checkboxes = document.querySelectorAll('input[id="licencia"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }

</script>
