@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<?php
$originalDate = $verificacion->primer_semestre;
$newDate = date("d/m/Y", strtotime($originalDate));
?>

                <div class="row bg-profile" style="z-index: 100000">
                        @if(Session::has('success'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado la <b>Verificacion</b>, ' +
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
                                    <strong>Verificacion</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

{{--                    <div class="col-12 p-3">
                        <p class="text-center">
                            <img class="" src="{{ asset('img/icon/seguros/'.$img) }}" width="150px" ><br>
                        </p>
                    </div>--}}

                </div>


       <form method="POST" action="{{route('update_admin.verificacion',$verificacion->id)}}" enctype="multipart/form-data" role="form">
             @csrf
           <input type="hidden" name="_method" value="PATCH">

                @if(Session::has('success2'))
                    <script>
                        Swal.fire(
                            'Exito!',
                            'Se ha guardado exitosamiente.',
                            'success'
                        )
                    </script>
                @endif

                <div class="row bg-image" >
                    <div class="col-12 mt-5">

                            <p class="text-left text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                                <strong>Detalles de Verificacion</strong>
                            </p>
                            {{--Datos para el calendario--}}
                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='title' name="title" value="{{$verificacion->Automovil->placas}}">
                            </div>

                             <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='descripcion' name="descripcion" value="Le toca verificar el dia {{$newDate}}">
                            </div>

                             <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='color' name="color" value="#FF0000">
                            </div>
                            {{--Datos para el calendario--}}

                                <input type="hidden" class="form-control" id='id_user' name="id_user" value="{{$verificacion->id_user}}">
                                <input type="hidden" class="form-control" id='id_empresa' name="id_empresa" value="{{$verificacion->id_empresa}}">
                                <input type="hidden" class="form-control" id='current_auto' name="current_auto" value="{{$verificacion->current_auto}}">

                                 <label for="">
                                     <p class="text-white"><strong>Placas</strong></p>
                                 </label>

                                <div class="input-group col-6">
                                    <input type="text" class="form-control" placeholder="arf-515" id="num_placa" name="num_placa" value="{{$verificacion->Automovil->placas}}" readonly>
                                </div>

                             <label for="">
                                 <p class="text-white"><strong>Primer Periodo</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                    </span>
                                </div>
                                 <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='primer_semestre' name="primer_semestre" value="{{$verificacion->primer_semestre}}">
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Segundo Periodo</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                    </span>
                                </div>
                                 <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='segundo_semestre' name="segundo_semestre" value="{{$verificacion_segunda->segundo_semestre}}">
                            </div>

                    </div>

                    <div class="col-12 text-center mt-5 mb-5">
                        <button class="btn btn-lg btn-save-neon text-white">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                            Actualizar
                        </button>
                    </div>

                </div>
       </form>

@endsection

