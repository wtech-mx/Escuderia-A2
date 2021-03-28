@extends('layouts.app')

@section('content')

                <div class="row bg-image" >

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Alertas y Calendario</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                </div>


                <div class="row bg-image" >

                    <div class="col-12 mt-3 p-4">
                        <div class=" d-flex justify-content-between bg-white p-2 rounded-pill">
                            <span class="badge badge-pill" style="background-color: #2ECC71">Noticia</span>
                            <span class="badge badge-pill" style="background-color: #8E44AD">Seguro</span>
                            <span class="badge badge-pill" style="background-color: #F1C40F;color: #000000">Tarjeta Circulacion</span>
                            <span class="badge badge-pill" style="background-color: #FF0000">Verificacion</span>
                            <span class="badge badge-pill" style="background-color: #2980B9">Servicos</span>
                        </div>
                    </div>

                </div>

                <div class="row bg-image" style="margin-bottom: 16rem !important;">
                    <div class="col-12">
                        @include('alerts.calendar')
                        @include('alerts.modal')
                    </div>
                </div>


@endsection
