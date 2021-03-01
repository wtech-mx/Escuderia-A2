@extends('layouts.app')

@section('content')
<link href="{{ asset('css/tarjeta-circulacion.css') }}" rel="stylesheet">

<div class="row bg-blue" style="background-image: linear-gradient(to bottom, #24b6f7, #009fff, #0086ff, #0066ff, #243afc);">


                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong> Tarjeta de Circulacion</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                  title: 'Exito!!',
                                  html:
                                    'Se ha actualizado tu  <b>Tarjeta de Circulación</b>, ' +
                                    'Exitosamente',
                                  // text: 'Se ha agragado la "MARCA" Exitosamente',
                                  imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                  background: '#fff',
                                  imageWidth: 150,
                                  imageHeight: 150,
                                  imageAlt: 'USUARIO IMG',
                                })
                            </script>
                        @endif

                        {{------------------------------------}}
                        {{--      Tarjeta Circulacion  --}}
                        {{------------------------------------}}

                                         <div class="col-12">
                                            <div class="card mx-auto">
                                                <p class="heading">Tarjeta de Circulacion</p>

                                                <form class="card-details" method="POST" action="{{route('store_admin.tarjeta-circulacion')}}" enctype="multipart/form-data" role="form">
                                                    @csrf

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Nombre</p>
                                                        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                                                    </div>

                                                    <p class="text-muted mt-3">Tarjeta de Circulacion </p>

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Tipo_placa</p>
                                                        <select class="form-control" id="tipo_placa" name="tipo_placa">
                                                                <option value="Particular">Particular</option>
                                                                <option value="Carga">Carga</option>
                                                                <option value="Hybrido">Hybrido</option>
                                                                <option value="Electrico">Electrico</option>
                                                                <option value="Discapacidad">Discapacidad</option>
                                                                <option value="Ambulancia">Ambulancia</option>
                                                                <option value="Patrulla">Patrulla</option>
                                                                <option value="Escolta">Escolta</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Lugar_expedicion </p>
                                                        <select class="form-control" id="lugar_expedicion" name="lugar_expedicion">
                                                            @include('tarjeta-circulacion.estados')
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Usuario</p>
                                                        <select class="form-control" id="lugar_expedicion" name="lugar_expedicion">
                                                             <option value="">Seleccione usuario</option>
                                                                 @foreach($user as $item)
                                                                    <option value="{{$item->id}}">{{ ucfirst($item->name)}}</option>
                                                                 @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="text-warning mb-2">Automovil</p>
                                                        <select class="form-control" id="lugar_expedicion" name="lugar_expedicion">
                                                             <option value="">Seleccione Automovil</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group pt-2">
                                                        <div class="row d-flex">

                                                            <div class="col-sm-6">
                                                                <p class="text-warning mb-2">Fecha de emisión</p>
                                                                <input type="date" name="fecha_emision" id="fecha_emision" placeholder="MM/YYYY">
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <p class="text-warning mb-2">Fecha de vencimiento</p>
                                                                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" placeholder="MM/YYYY">
                                                            </div>


                                                            <div class="col-sm-6 mt-3">
                                                                <p class="text-warning mb-2">Agregar imagen</p>
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn ml-5" data-toggle="modal" data-target="#exampleModal" style="background: #FFFFFF !important;">
                                                                 <img class="d-inline mb-2" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="30px">
                                                                </button>
                                                            </div>

                                                            <div class="col-sm-12 mt-5">
                                                                <button class="btn btn-primary btn-save">
                                                                    <i class="fas fa-arrow-right px-3 py-2"></i>
                                                                </button>
                                                            </div>



                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            @if($tarjeta_circulacion->id_tc == NULL)

                                                @else
                                                <img class="rounded-circle" src="{{ asset('img-tc/'.$tarjeta_circulacion->ImgTc->img) }}" height="150px" width="50px">
                                            @endif
                                        </div>

@include('tarjeta-circulacion.modal-ts-img')

</div>
                                     <!-- Select anidado User-->
                                    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_user').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_user no esta en la tabla de automovil
                                                    $('#current_auto').empty();
                                                    $('#current_auto').append(`<option value="" disabled selected>Prosesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relafionados con el id_user
                                                    $('#current_auto').empty();
                                                    $('#current_auto').append(`<option value="" disabled selected>Seleccione Automovil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_auto').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>






@endsection
