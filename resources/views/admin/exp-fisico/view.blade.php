@extends('admin.layouts.app')

@section('content')

@section('crop-css')
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

<link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

<div class="row bg-down-blue " style="border-radius: 0 0 0 0; height: 95vh;">

                        @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                title: 'Exito!!',
                                html:
                                    'Se ha agragado la <b>Foto</b>, ' +
                                    'Exitosamente',
                                // text: 'Se ha agragado la "MARCA" Exitosamente',
                                imageUrl: '{{ asset('img/icon/color/matricula.png') }}',
                                background: '#fff',
                                imageWidth: 150,
                                imageHeight: 150,
                                imageAlt: 'Facturas IMG',
                                })
                            </script>
                        @endif

                        @if(Session::has('destroy'))
                            <script>
                                Swal.fire({
                                title: 'Exito!!',
                                html:
                                    'Se ha eliminado su <b>Foto</b>, ' +
                                    'Exitosamente',
                                // text: 'Se ha agragado la "MARCA" Exitosamente',
                                imageUrl: '{{ asset('img/icon/color/delete.png') }}',
                                background: '#fff',
                                imageWidth: 150,
                                imageHeight: 150,
                                imageAlt: 'Facturas IMG',
                                })
                            </script>
                        @endif

                        @php
                            $host= $_SERVER["REQUEST_URI"];
                            $rest = substr($host, 18);
                            switch($rest){
                                case($rest == 'factura/view/'.$automovil->id):
                                        $expedientes= $exp_factura;
                                        $nombre = 'Facturación';
                                    break;
                                case($rest == 'bp/view/'.$automovil->id):
                                        $expedientes= $exp_placas;
                                        $nombre = 'Baja de Placas';
                                    break;
                                case($rest == 'cd/view/'.$automovil->id):
                                        $expedientes= $exp_domicilio;
                                        $nombre = 'Comprobante de Domicilio';
                                    break;
                                case($rest == 'cr/view/'.$automovil->id):
                                        $expedientes= $exp_carta;
                                        $nombre = 'Carta Responsiva/ Identificación';
                                    break;
                                case($rest == 'ine/view/'.$automovil->id):
                                        $expedientes= $exp_ine;
                                        $nombre = 'INE';
                                    break;
                                case($rest == 'poliza/view/'.$automovil->id):
                                        $expedientes= $exp_poliza;
                                        $nombre = 'Poliza de Seguro';
                                    break;
                                case($rest == 'reemplacamiento/view/'.$automovil->id):
                                        $expedientes= $exp_reemplacamiento;
                                        $nombre = 'Reemplacamiento';
                                    break;
                                case($rest == 'rfc/view/'.$automovil->id):
                                        $expedientes= $exp_rfc;
                                        $nombre = 'RFC';
                                    break;
                                case($rest == 'tc/view/'.$automovil->id):
                                        $expedientes= $exp_tc;
                                        $nombre = 'Tarjeta de Circulación';
                                    break;
                                case($rest == 'tenencia/view/'.$automovil->id):
                                        $expedientes= $exp_tenencias;
                                        $nombre = 'Tenencia';
                                    break;
                                case($rest == 'certificado/view/'.$automovil->id):
                                        $expedientes= $exp_certificado;
                                        $nombre = 'Certificado Verificación';
                                    break;
                            }
                        @endphp
                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index_admin.view-exp-fisico-admin') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>{{$nombre}}</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <strong class="text-center" style="color: rgb(102, 223, 66)">  {{ $automovil->placas }}</strong>

                        @can('Crear Exp')
                        <div class="col-12 mt-3 mb-5">
                            <div class="d-flex justify-content-between">
                            <p class="text-center text-white">
                                Agregar m&aacute;s
                            </p>

                                <!-- Button trigger modal -->
                                <button  class="btn " data-toggle="modal" data-target="#exampleModal">
                                 <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </button>

                            </div>
                        </div>
                        @endcan

                    @if ($expedientes->count())

                        @foreach($expedientes as $item)
                            @php
                            $texto= substr($item->img, -3);
                            switch($rest){
                                case($rest == 'factura/view/'.$automovil->id):
                                    $ruta= 'exp-factura/';
                                break;
                                case($rest == 'bp/view/'.$automovil->id):
                                    $ruta= 'exp-placa/';
                                break;
                                case($rest == 'cd/view/'.$automovil->id):
                                    $ruta = 'exp-domicilio/';
                                break;
                                case($rest == 'cr/view/'.$automovil->id):
                                    $ruta = 'exp-certificado/';
                                    break;
                                case($rest == 'ine/view/'.$automovil->id):
                                    $ruta = 'exp-ine/';
                                    break;
                                case($rest == 'poliza/view/'.$automovil->id):
                                    $ruta = 'exp-poliza/';
                                    break;
                                case($rest == 'reemplacamiento/view/'.$automovil->id):
                                    $ruta = 'exp-reemplacamiento/';
                                    break;
                                case($rest == 'rfc/view/'.$automovil->id):
                                    $ruta = 'exp-rfc/';
                                    break;
                                case($rest == 'tc/view/'.$automovil->id):
                                    $ruta = 'exp-tc/';
                                    break;
                                case($rest == 'tenencia/view/'.$automovil->id):
                                    $ruta = 'exp-tenencia/';
                                    break;
                                case($rest == 'certificado/view/'.$automovil->id):
                                    $ruta = 'exp-certificado/';
                                    break;
                            }
                            @endphp
                            <div class="col-6">
                                <a  class="" data-toggle="modal" data-target="#modal-doc-{{$item->id}}">
                                        @if($texto == 'pdf')
                                            <p class="text-center">
                                                <iframe width="140" height="140" src="{{asset($ruta.$item->img)}}" frameborder="0"></iframe>
                                                <p class="text-center text-white">{{$item->titulo}}</p>
                                            </p>
                                        @else
                                            <p class="text-center">
                                                    <img class="d-inline mb-2" src="{{asset($ruta.$item->img)}}" width="100px">
                                                    <p class="text-center text-white">{{$item->titulo}}</p>
                                            </p>
                                        @endif
                                </a>
                            </div>
                            <!-- Modal View -->
                            <div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
                              <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">

                                  <div class="modal-body">
                                      <div class="row justify-content-center">
                                          <div class="col-12 text-center mb-3">
                                              <h5 class="modal-title"><strong>{{$item->titulo}}</strong></h5>
                                          </div>
                                      </div>
                                      <div class="row justify-content-center">
                                          <div class="d-flex align-items-center">
                                              <div class="col-11">
                                                  <p class="text-center">
                                                      <img class="" src="{{asset($ruta. '/' . $item->img)}}" style="height: 300px!important;">
                                                  </p>
                                              </div>
                                              <div class="col-1">
                                                  @can('Borrar Exp')
                                                  <a  class="btn btn-danger text-white p-2 mt-5 mb-5" data-toggle="modal" data-target="#modal{{$item->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                  </a>
                                                  @endcan
                                                    <a  class="btn btn-secondary p-2" data-dismiss="modal">
                                                        <i class="fa fa-window-close" aria-hidden="true"></i>
                                                    </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                </div>
                              </div>
                            </div>

                            @include('exp-fisico.eliminar')
                        @endforeach

                    @else

                        <div class="col-12 mb3">
                            <p class="text-center title-car">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/paper (1).png') }}" alt="Icon documento" width="150px">

                            </p>
                            <p class="text-center  text-white">
                             <strong style="font: normal normal bold 20px/20px Segoe UI;">A&uacute;n no tienes Expedientes! </strong><br>
                             Escanea tus documentos has <br> click en el botón de + para <br> agregar tu expediente
                            </p>
                        </div>

                        <div class="col-12 mt-5">
                            <p class="text-center">
                                 <button  class="btn " data-toggle="modal" data-target="#exampleModal">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="60px">
                                </button>
                            </p>
                        </div>


                        <div class="col-12 mt-3">
                            <p class="text-center text-white">
                                Escanea tu Expediente
                            </p>
                        </div>

                    @endif

                        <!-- Modal -->
                        @include('admin.exp-fisico.create')

</div>

@endsection
