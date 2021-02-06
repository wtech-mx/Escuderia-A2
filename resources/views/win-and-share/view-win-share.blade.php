@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
                <link href="{{ asset('css/win-share.css') }}" rel="stylesheet">

                <div class="row bg-profile" >

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Comparte y Gana</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-9 mt-3">
                            <p class="text-left subtitle-win">
                             <strong class="title-win">Gana $200 MXN </strong> <br>
                             por cada amigo que invites
                            </p>
                    </div>

                    <div class="col-3 mt-3">
                            <p class="text-left">
                                <img class="" src="{{ asset('img/icon/color/winning.png') }}" width="70px" >
                            </p>
                    </div>

                </div>

                <div class="row bg-down-blue-border" style="background: #050F55 0% 0% no-repeat padding-box;">
                    <div class="col-12 mt-5">
                        <p class="text-left text-white sub-tittle-min ml-3">
                            Compartir con mis amigos
                        </p>
                    </div>

                    <div class="col-12 p-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body" >

                                <p class="card-text text-center">
                                    <strong class="" style="font: normal normal bold 25px/33px Segoe UI;">MX6E2342</strong> <br>

                                    <button class="btn button-win mt-3">
                                        Copiar
                                    </button> <br>
                                </p>
                                <p class="text-center" style="font: normal normal normal 15px/20px Segoe UI;color: #A7A7A7;">
                                    o comparte por
                                </p>
                                <p class="text-center">
                                   <i class="bi bi-facebook" style="color: #4867AA;font-size: 40px"></i>

                                   <i class="bi bi-whatsapp" style="color: #3FBC4F;font-size: 40px"></i>
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <p class="text-left text-white sub-tittle-min ml-3">
                            Mi monedero
                        </p>
                    </div>

                    <div class="col-12 p-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body" >

                                <p class="card-text text-center">
                                    <strong class="" style="font: normal normal bold 25px/33px Segoe UI;color: #E59A38;">
                                        $200 MXN
                                    </strong> <br>
                                </p>

                                <p class="text-center" style="font: normal normal normal 15px/20px Segoe UI;color: #A7A7A7;">
                                    Valido hasta 05/08/2021
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <p class="text-left text-white sub-tittle-min ml-3">
                          Como funciona la promocion
                        </p>
                    </div>

                    <div class="col-12 p-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body" >

                                <p class=" text-center">
                                    <ul class="li">
                                       <img class="" src="{{ asset('img/icon/color/letra.png') }}" width="25px" >
                                       <strong>Invita a tus amigos</strong> <br>
                                    comparte tu código y obtén descuentos
                                    </ul>

                                    <ul class="li">
                                         <img class="" src="{{ asset('img/icon/color/support.png') }}" width="25px" >
                                        <strong>¿Qué ganana tus amigos?</strong> <br>
                                        Un cupon que podrán usar en su primer servicio
                                    </ul>

                                    <ul class="li">
                                         <img class="" src="{{ asset('img/icon/color/medal.png') }}" width="25px" >
                                        <strong>¿Qué ganas tu?</strong> <br>
                                        Un cupon cuando tus referidos tomen su primer servicio
                                    </ul>
                                </p>

                            </div>
                        </div>
                    </div>

                </div>

@endsection
