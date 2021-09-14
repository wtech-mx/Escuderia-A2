@extends('layouts.app')

@section('content')


<div class="row bg-down-blue " style="border-radius: 0 0 0 0; height: 100vh;">

        @if(Session::has('success'))
        <script>
            Swal.fire({
                title: 'Exito!!',
                html:
                'Se ha guardado su <b>Foto</b>, ' +
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
            $rest = substr($host, 1);
            switch($rest){
                case($rest == 'factura/view'):
                        $expedientes= $exp_factura;
                        $nombre = 'Facturación';
                    break;
                case($rest == 'bp/view'):
                        $expedientes= $exp_placas;
                        $nombre = 'Baja de Placas';
                    break;
                case($rest == 'cd/view'):
                        $expedientes= $exp_domicilio;
                        $nombre = 'Comprobante de Domicilio';
                    break;
                case($rest == 'cr/view'):
                        $expedientes= $exp_carta;
                        $nombre = 'Carta Responsiva/ Identificación';
                    break;
                case($rest == 'ine/view'):
                        $expedientes= $exp_ine;
                        $nombre = 'INE';
                    break;
                case($rest == 'poliza/view'):
                        $expedientes= $exp_poliza;
                        $nombre = 'Poliza de Seguro';
                    break;
                case($rest == 'reemplacamiento/view'):
                        $expedientes= $exp_reemplacamiento;
                        $nombre = 'Reemplacamiento';
                    break;
                case($rest == 'rfc/view'):
                        $expedientes= $exp_rfc;
                        $nombre = 'RFC';
                    break;
                case($rest == 'tc/view'):
                        $expedientes= $exp_tc;
                        $nombre = 'Tarjeta de Circulación';
                    break;
                case($rest == 'tenencia/view'):
                        $expedientes= $exp_tenencias;
                        $nombre = 'Tenencia';
                    break;
                case($rest == 'certificado/view'):
                        $expedientes= $exp_certificado;
                        $nombre = 'Certificado Verificación';
                    break;
                case($rest == 'inventario/view'):
                        $expedientes= $exp_inventario;
                        $nombre = 'Inventario';
                    break;
            }
        @endphp

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                    <div class="text-center text-white">
                        <a href="{{ route('index_exp') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                        </a>
                    </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                    @foreach($automovile as $item)
                        @if($item->id == auth()->user()->current_auto)
                                <strong>{{$nombre}}</strong> - {{$item->placas }} / {{ $item->submarca }}
                        @endif
                    @endforeach
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                    </div>
            </div>
        </div>

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

        @if ($expedientes->count())
            @foreach($expedientes as $item)

                @php
                    $texto= substr($item->img, -3);
                    switch($rest){
                        case($rest == 'factura/view'):
                            $ruta= 'exp-factura/';
                        break;
                        case($rest == 'bp/view'):
                            $ruta= 'exp-placa/';
                        break;
                        case($rest == 'cd/view'):
                            $ruta = 'exp-domicilio/';
                        break;
                        case($rest == 'cr/view'):
                            $ruta = 'exp-certificado/';
                            break;
                        case($rest == 'ine/view'):
                            $ruta = 'exp-ine/';
                            break;
                        case($rest == 'poliza/view'):
                            $ruta = 'exp-poliza/';
                            break;
                        case($rest == 'reemplacamiento/view'):
                            $ruta = 'exp-reemplacamiento/';
                            break;
                        case($rest == 'rfc/view'):
                            $ruta = 'exp-rfc/';
                            break;
                        case($rest == 'tc/view'):
                            $ruta = 'exp-tc/';
                            break;
                        case($rest == 'tenencia/view'):
                            $ruta = 'exp-tenencia/';
                            break;
                        case($rest == 'certificado/view'):
                            $ruta = 'exp-certificado/';
                            break;
                        case($rest == 'inventario/view'):
                            $ruta = 'exp-inventario/';
                            break;
                    }
                @endphp

                <div  class="col-6">
                    <a   data-toggle="modal" data-target="#modal-doc-{{$item->id}}">
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

                @include('admin.exp-fisico.modal-view')
                @include('exp-fisico.eliminar')
            @endforeach


        @else
            <div class="row bg-down-blue " style="border-radius: 0 0 0 0;">
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
            </div>
        @endif

        <!-- Modal -->
        @include('admin.exp-fisico.create')

</div>

    <div class="modal-cambio-car">
        <button type="button" class="btn btn-primary cambio-carro" data-toggle="modal" data-target="#cambio-car">
          Cambiar auto
        </button>
    </div>

<!-- Modal -->
<div class="modal fade" id="cambio-car" tabindex="-1" role="dialog" aria-labelledby="cambio-carTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-down-image-border" style="min-height: 10vh;border: solid 3px #00ff37;">

      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Auto Actual:
            @foreach($automovile as $item)
            <strong>{{ $item->submarca }} / {{ $item->placas }}</strong>
            @break
            @endforeach
        </h5>

        <button  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body ">
                <form action="{{route('current_auto', auth()->user()->id)}}" method="POST" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">

                        <div class="col-12">
                           @foreach($automovile as $item)
                            <ul class="text-white">
                                <li>
                                    <strong>Modelo:</strong>
                                    {{$item->submarca}}
                                </li>
                                <li>
                                    <strong>Año:</strong>
                                    {{$item->año}}
                                </li>
                                <li>
                                    <strong>Placas:</strong>
                                    {{$item->placas}}
                                </li>
                            </ul>
                               @break
                             @endforeach

                            <label for="" class="mt-2 mb-2">
                                <p class="text-white"><strong>Cambia de auto para ver los datos</strong></p>
                            </label>

                            <div class="input-group form-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px">
                                    </span>
                                </div>

                                <select class="form-control input-edit-car" id="current_auto" name="current_auto" >
                                    <option value="">Cambiar de Auto</option>
                                    @foreach($automovile as $item)
                                        <option value="{{$item->id}}"><strong>Modelo:</strong>{{$item->submarca}}  / <strong>Placas:</strong>{{$item->placas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5 mb-5" >
                            <button class="btn btn-lg btn-save-neon text-white">
                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>

      </div>

    </div>
  </div>
</div>
@endsection
