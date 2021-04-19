@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
                <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
<?php
$originalDate = $verificacion->primer_semestre;
$newDate = date("d/m/Y", strtotime($originalDate));
?>

                <div class="row bg-profile" style="z-index: 100000;height: 10vh">

                    @if(Session::has('success'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado la <b>Verificaci&oacute;n</b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/factura.png') }}',
                              background: '#fff',
                              imageWidth: 150,
                              imageHeight: 150,
                              imageAlt: 'Facturas IMG',
                            })
                        </script>
                        @endif

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index_admin.verificacion') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Verificaci&oacute;n</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                </div>

                <div class="row bg-image" style="height: 85vh">

                <div class="col-12 mt-5">
                         <div class="col-6 mt-4">
                            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px" >
                            </a>

                            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px" >
                            </a>
                        </div>
                </div>

               <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            @include('admin.verificacion.primer-periodo')
                        </div>

                        <div class="carousel-item">
                            @include('admin.verificacion.segundo-periodo')
                        </div>
                    </div>
               </div>

               </div>
@endsection

