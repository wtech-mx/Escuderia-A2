@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

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
                        <a href="{{ route('remision') }}">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                    </a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mt-3">
            <strong style="color: #00d62e">Nombre:</strong> <a style="color: #fff; font-size:15px">{{$cotizacion->Cotizacion->User->name}}</a><br>
            <strong style="color: #00d62e">Telefono:</strong> <a href="tel:5539907266" style="color: #fff; font-size:15px">{{$cotizacion->Cotizacion->User->telefono}}</a><br>
        </div>
        <div class="col-6 mt-3">
            <strong style="color: #00d62e">Km:</strong> <a style="color: #fff; font-size:15px">{{$cotizacion->Cotizacion->km}} km</a><br>
            <strong style="color: #00d62e">Placas:</strong> <a style="color: #fff; font-size:15px">{{$cotizacion->Cotizacion->Automovil->placas}}</a><br>
    </div>
</div>
<div class="row  bg-down-image-border" >
    <div class="col-12  mt-5">


        <form class="card-details" method="POST" action="{{route('update.remision')}}" enctype="multipart/form-data" role="form">
            @csrf

                @if(Session::has('success'))
                    <script>
                        Swal.fire({
                            title: 'Exito!!',
                            html:
                            'Se ha actualizado tu  <b>Remision</b>, ' +
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

                <div class="col-6 mb-2">
                    <strong style="color: #00d62e">Fecha:</strong> <input class="form-control" type="date" name="fecha_cotizacion" id="fecha_cotizacion">
                </div>

                <table class="table table-bordered" id="tabla">

                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Reparaciòn</th>
                            <th>Mano O.</th>
                            <th>Refacción</th>
                        </tr>
                    </thead>
                </table>

                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                            <strong style="color: #fff">Importe sin iva</strong>
                    </div>
                    <div class="col-4">
                        <input class="form-control" type="number" name="total_cotizacion" id="total_cotizacion">
                    </div>
                </div>
                <input class="form-control" type="text" name="id_co" id="id_co" value="{{$cotizacion->id_cotizacion}}" style="display: none" disable>

                <a href="javascript:;" id="agregar" class="btn btn-success">Agregar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>

            <a class="btn btn-primary mt-5" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver Cotizaciòn
            </a>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form class="card-details" method="POST" action="{{route('updateremision.remision', $cotizacion->id_cotizacion)}}" enctype="multipart/form-data" role="form">
                        @csrf
                    <div class="row mt-3 mb-3">
                        <div class="col-2">
                            <strong>Fecha Cotizacion</strong>
                        </div>
                        <div class="col-4">
                                <input type="text" data-id="{{ $total_remision->id }}" class="form-control fecha_cotizacion" placeholder="{{$total_remision->fecha_cotizacion}}" id="fecha_cotizacion" name="fecha_cotizacion">
                        </div>
                        <div class="col-2">
                            <strong>Fecha Remision</strong>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="date" value="{{$total_remision->fecha_remision}}" name="fecha_remision" id="fecha_remision">
                        </div>
                    </div>
                    <table class="table table-bordered" id="tabla" >
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>Apro.</th>
                                <th>Reparaciòn</th>
                                <th>Mano O.</th>
                                <th>Refacción</th>
                                <th>Borrar</th>
                            </tr>
                        <thead>
                        <tbody>
                            @foreach ($remision as $item)
                                <tr>
                                    <td>
                                        <input data-id="{{ $item->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $item->aprobacion ? 'checked' : '' }}>
                                    </td>
                                    <td style="color: #000000"><input type="text" data-id="{{ $item->id }}" class="form-control reparacion" placeholder="{{$item->reparacion}}" id="reparacion" name="reparacion"></td>
                                    <td style="color: #000000"><input type="text" data-id="{{ $item->id }}" class="form-control mano" placeholder="{{$item->mano}}" id="mano" name="mano"></td>
                                    <td style="color: #000000"><input type="text" data-id="{{ $item->id }}" class="form-control importe" placeholder="{{$item->importe}}" id="importe" name="importe"></td>
                                    <td>
                                        <button class="btn btn-danger delete-link" value="{{$item->id}}" onclick="location.reload()"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                        <div class="row">
                            <div class="col-2">
                                    <strong>Total Cotizacion</strong>
                            </div>
                            <div class="col-2">
                                <input type="text" data-id="{{ $total_remision->id }}" class="form-control total_cotizacion" placeholder="{{$total_remision->total_cotizacion}}" id="total_cotizacion" name="total_cotizacion">
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-2">
                                    <strong>Total Remision</strong>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="number" value="{{$total_remision->total_remision}}" name="total_remision" id="total_remision">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success mt-4">Guardar</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                        <a class="btn btn-success mt-5" href="{{route('print.cotizacion', $cotizacion->id_cotizacion)}}">
                            Descargar Cotizaciòn
                        </a>
                </div>
                <div class="col-12">
                        <a class="btn btn-success mt-5" href="{{route('printf.remision', $cotizacion->id_cotizacion)}}">
                            Descargar Remision
                        </a>
                </div>
            </div>

            @include('admin.cotizacion.script-remision')
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
                        url: '/remision/' + id,
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
