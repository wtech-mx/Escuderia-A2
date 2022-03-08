@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .table > :not(caption) > * > *{
            color: #fff;
            font-size: 10px;
        }
        input::placeholder {
          color: #00d62e!important;
          font-size: 1.2em;
          font-style: italic;
        }
        .table th, .table td{
            padding: 0.75rem 0 0.75rem 0!important;
        }
    </style>
@endsection


<link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<div class="bg-down-image-border" style=" min-height: 10vh">
    <div class="row">
        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                    <div class="text-center text-white">
                        <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                        </a>
                    </div>
            </div>
        </div>

        <div class="col-8 mt-5">
                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Cotizacion Diagnostico</strong>
                    </h5>
        </div>

        <div class="col-2 mt-5">
            <div class="d-flex justify-content-start">
                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <a href="{{ route('edit.remision', $cotizacion->id_cotizacion) }}">
                        <img class="" src="{{ asset('img/icon/color/pdf.png') }}" width="25px" >
                    </a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-5">
            <strong style="color: #00d62e">Fecha:</strong> <a style="color: #fff; font-size:15px">{{ $cotizacion->Cotizacion->fecha }}</a><br>
            <strong style="color: #00d62e">Nombre:</strong> <a style="color: #fff; font-size:15px">{{ $cotizacion->Cotizacion->User->name }}</a><br>
            <strong style="color: #00d62e">Km:</strong> <a style="color: #fff; font-size:15px">{{ $cotizacion->Cotizacion->km }} KM</a><br>
        </div>
        <div class="col-6 mt-5">
            <strong style="color: #00d62e">Telefono:</strong> <a href="tel:{{$cotizacion->Cotizacion->User->telefono}}" style="color: #fff; font-size:15px">{{ $cotizacion->Cotizacion->User->telefono }}</a><br>
            <strong style="color: #00d62e">Placas:</strong> <a style="color: #fff; font-size:15px">{{ $cotizacion->Cotizacion->Automovil->placas }}</a><br>
        </div>
    </div>
</div>

        <div class="row  bg-down-image-border" >
            <div class="col-12  mt-5">


                <form class="card-details" method="POST" action="{{route('update.taller')}}" enctype="multipart/form-data" role="form">
                    @csrf

                        @if(Session::has('success'))
                            <script>
                                Swal.fire({
                                    title: 'Exito!!',
                                    html:
                                    'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
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

                        <table class="table table-bordered" id="tabla">

                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Refa.</th>
                                    <th>Pro.</th>
                                    <th>Marca</th>
                                    <th>I.U.</th>
                                    <th>I.T.</th>
                                </tr>
                            </thead>
                        </table>

                        <input class="form-control" type="text" name="id_co" id="id_co" value="{{ $cotizacion->id_cotizacion }}" style="display: none" disable>

                        <a href="javascript:;" id="agregar" class="btn btn-success">Agregar servicio</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>

                    <a class="btn btn-primary mt-5" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Ver Historial
                    </a>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <table class="table table-bordered" id="data_table" >
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>Ven.</th>
                                        <th>Refa.</th>
                                        <th>Marca</th>
                                        <th>I.U.</th>
                                        <th>I.T.</th>
                                        <th>Borrar</th>
                                    </tr>
                                <thead>
                                <tbody>
                                    @foreach ($taller as $item)
                                    <tr>
                                        <td style="color: #070707"><input type="text" data-id="{{ $item->id }}" class="form-control toggle-class" placeholder="{{$item->vendedor}}" id="vendedor" name="vendedor"></td>
                                        <td style="color: #070707"><input type="text" data-id="{{ $item->id }}" class="form-control refaccion" placeholder="{{$item->refaccion}}" id="refaccion" name="refaccion"></td>
                                        <td style="color: #070707"><input type="text" data-id="{{ $item->id }}" class="form-control mano_obra" placeholder="{{$item->mano_obra}}" id="mano_obra" name="mano_obra"></td>
                                        <td style="color: #070707"><input type="text" data-id="{{ $item->id }}" class="form-control importe_unitario" placeholder="{{$item->importe_unitario}}" id="importe_unitario" name="importe_unitario"></td>
                                        <td style="color: #070707"><input type="text" data-id="{{ $item->id }}" class="form-control importe_total" placeholder="{{$item->importe_total}}" id="importe_total" name="importe_total"></td>
                                        <td>
                                            <button class="btn btn-danger delete-link" value="{{$item->id}}" onclick="location.reload()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @include('admin.cotizacion.script-taller')
                    <script>
                        jQuery('.delete-link').click(function () {
                            var id = $(this).val();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "DELETE",
                                url: '/cotizacion/' + id,
                                success: function (data) {
                                    console.log(data);
                                    $("#item" + id).remove();
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                }
                            });
                        });

                    </script>
@endsection
