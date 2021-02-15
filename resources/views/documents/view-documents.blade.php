@extends('layouts.app')

@section('content')


<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #24b6f7, #009fff, #0086ff, #0066ff, #243afc);">


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
                                        <strong> Documentacion</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        {{-----------------------------------  -}}
                        {{--      Vista sin regostro de Docs  --}}
                        {{------------------------------------}}


                        <div class="col-6 mt-5 mb-5">
                            <p class="text-center">
                                <a href="{{ route('index.exp-tc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                Fecha de exp de Tarjeta de Circulación
                            </p>
                        </div>

                        <div class="col-6 mt-5 mb-5">
                            <p class="text-center">
                                <a href="{{ route('index.vencimiento-tc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                Fecha de vencimiento de Tarjeta de Circulación
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('index.lugar-tc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                Lugar de expedicion de Tarjeta Circulación
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('index.otro-tc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                otro
                            </p>
                        </div>

</div>

@endsection
