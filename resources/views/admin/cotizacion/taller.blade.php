@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style=" min-height: 10vh">
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
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
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
                                            <th>Servicio</th>
                                            <th>Vendedor</th>
                                            <th>Cantidad</th>
                                            <th>I.U.</th>
                                            <th>I.T.</th>
                                        </tr>
                                    </thead>
                                </table>

                                <input class="form-control" type="text" name="id_co" id="id_co" value="{{ $cotizacion->id_cotizacion }}" style="display: none" disable>

                                <a href="javascript:;" id="agregar" class="btn btn-success">Agregar a tabla</a>
                                <button type="submit" class="btn btn-success">Guardar a la BD</button>
                            </form>

                            <a class="btn btn-primary mt-5" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Ver Historial
                            </a>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <table class="table table-bordered" id="tabla" >
                                        <thead class="table-dark">
                                            <tr class="text-center">
                                                <th>Vendedor</th>
                                                <th>Refaccion</th>
                                                <th>Cantidad</th>
                                                <th>I.U.</th>
                                                <th>I.T.</th>
                                            </tr>
                                        <thead>
                                        <tbody>
                                            @foreach ($taller as $item)
                                            <tr>
                                                <td>{{$item->vendedor}}</td>
                                                <td>{{$item->refaccion}}</td>
                                                <td>{{$item->cantidad}}</td>
                                                <td>{{$item->importe_unitario}}</td>
                                                <td>{{$item->importe_total}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <script type="text/javascript">
                                $('#agregar').click(function(){
                                    agregar();
                                });

                                function agregar(){
                                    var vendedor=$('#vendedor').val();
                                    var refaccion=$('#refaccion').val();
                                    var cantidad=$('#cantidad').val();
                                    var id_co=$('#id_co').val();
                                    var fila='<tr>'+
                                    '<td><input type="text" class="form-control" placeholder="Vendedor" id="vendedor[]" name="vendedor[]"</td>'+
                                    '<td><input type="text" class="form-control" placeholder="Refaccion" id="refaccion[]" name="refaccion[]"</td>'+
                                    '<td><input type="number" class="form-control" placeholder="Cantidad" id="cantidad[]" name="cantidad[]"</td>'+
                                    '<td><input type="text" class="form-control" placeholder="Importe U." id="importe_unitario[]" name="importe_unitario[]"</td>'+
                                    '<td><input type="text" class="form-control" placeholder="Importe T." id="importe_total[]" name="importe_total[]"</td>'+
                                    '<td style="display: none"><input type="text" class="form-control" value="'+ id_co  +'" id="id_cotizacion[]" disable name="id_cotizacion[]"</td>'+
                                    '</tr>';

                                    $('#tabla').append(fila);
                                }
                            </script>
@endsection
