@extends('layouts.app')

@section('content')


<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #246af7, #315ffb, #4351fe, #573ffe, #6b24fc);">


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
                                        <strong> Expedientes Fisicos</strong>
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

                        <div class="col-12 mb3">
                            <p class="text-center title-car mt-5">
                                <img class="d-inline mb-2" src="{{ asset('img/icon/white/documento (2).png') }}" alt="Icon plus" width="150px">
                            </p>
                            <p class="text-center  text-white">
                             <strong style="font: normal normal bold 20px/20px Segoe UI;">¿Aun no tienes tu expediente?</strong><br>
                                Escanea tus documentos has <br> click en el botón de + para <br> agregar tus documentos
                            </p>
                        </div>

                        <div class="col-12 mt-5">
                            <p class="text-center">
                                <button class="btn">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="60px">
                                </button>
                            </p>
                        </div>

                        {{------------------------------------}}
                        {{--      esp fisico  con form    --}}
                        {{------------------------------------}}

                        <div class="col-12 mt-3">
                            <p class="text-center text-white">
                                Escanea tus documentos
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-factura') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                               Facturas
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-tenencia') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                               Tenencias
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-cr') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                               Carta Responsiva/ Identificacion
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-poliza') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                                Póliza de Seguro
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-tc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                               Copia de tarjeta de circulacion
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-reemplacamiento') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                              Reemplacamiento
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-bp') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                               Baja de placas
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-ine') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                              INE
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-cd') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                              Comprobante de domicilio
                            </p>
                        </div>

                        <div class="col-6">
                            <p class="text-center">
                                <a href="{{ route('view-rfc') }}">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon plus" width="30px">
                                </a>
                            </p>
                            <p class="text-center text-white">
                              RFC
                            </p>
                        </div>

</div>

@endsection

