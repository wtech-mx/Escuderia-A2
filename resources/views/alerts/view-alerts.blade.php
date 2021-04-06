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
                                    <a href="{{ route('calendar.index_calendar_user') }}"> <span class="badge badge-pill" style="background-color: #2ECC71">Alerta</span> </a>
                                    <a href="{{ route('index.seguro') }}"> <span class="badge badge-pill" style="background-color: #8E44AD">Seguro</span> </a>
                                    <a href="{{ route('index.tc') }}"> <span class="badge badge-pill" style="background-color: #F1C40F;color: #faf7f7">Tarjeta Circulaci&oacute;n</span> </a>
                                    <a href=""> <span class="badge badge-pill" style="background-color: #FF0000">Verificaci&oacute;n</span> </a>
                                    <a href=""> <span class="badge badge-pill" style="background-color: #2980B9">Servicios</span> </a>
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
