<!doctype html>
<html lang="en">

        <style>
        body{
            font-family: sans-serif;
        }

        @page {
            margin: 160px 50px;
        }

        header { position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 100px;
            background-color: #424242;
            color: #fff;
            text-align: center;
        }

        header h1{
            margin: 10px 0;
        }

        header h2{
            margin: 0 0 10px 0;
        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -50px;
            right: 0px;
            height: 40px;
            border-bottom: 2px solid #00d62e;
        }

        footer .page:after {
            content: counter(page);
        }

        footer table {
            width: 100%;
        }

        footer p {
            text-align: right;
        }

        footer .izq {
            text-align: left;
        }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border-radius: 6px;

        }

        td, th {
        text-align: center;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #edf7ea;
        }



        </style>
    <body>
        <header>
            <table class="container" align="right">
                <tbody>
                    <tr>
                        <td class="section" id="body_content">
                            <div class="image text-left">
                                <img alt="" width="200" src='https://checkn-go.com.mx/img/logo-check.png' style="margin: auto">
                            </div>
                        </td>

                        <td class="section" id="body_content">
                            <div class="image text-right">
                                <h2>Solicitud de Mantenimiento</h2>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>

        <footer>
            <table>
            <tr>
                <td>
                    <p class="izq">
                        Fecha: {{ \Carbon\Carbon::parse($today)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                    </p>
                </td>
                <td>
                <p class="page">
                    Página
                </p>
                </td>
            </tr>
            </table>
        </footer>

        <div id="content">
            <table class="container" align="right">
                <tbody>
                    <tr>
                        <td class="section" id="body_content">
                            <div class="text-item text-right heading" style="padding: 0;margin:0;">
                                <p style="padding: 0;margin:0;"><strong>Cliente</strong></p>
                            </div>
                            <div class="text-item text-right" style="padding: 0;margin:0;">
                                <p style="padding: 0;margin:0;">Nombre : {{$cotizacion->User->name}} </p>
                                <p style="padding: 0;margin:0;">Submarca : {{$cotizacion->Auto->submarca}}</p>
                                <p style="padding: 0;margin:0;">Placas : {{$cotizacion->Auto->placas}}</p>
                                <p style="padding: 0;margin:0;">Estatus : {{$cotizacion->estatus}}</p>
                            </div>
                        </td>

                        <td>
                            <div class="text-item text-right heading" style="padding: 0;margin:0;">
                                <p style="padding: 0;margin:0;"><strong>Taller</strong></p>
                            </div>
                            <div class="text-item text-right" style="padding: 0;margin:0;">
                                <p style="padding: 0;margin:0;">Nombre del Taller : {{$taller->nombre_taller}} </p>
                                <p style="padding: 0;margin:0;">Encargado : {{$taller->encargado}}</p>
                                <p style="padding: 0;margin:0;">Telefono : {{$taller->telefono}}</p>
                                <p style="padding: 0;margin:0;">Correo : {{$taller->correo}}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="container" align="center" style="margin-top: 1rem">
                <tbody>
                    <tr>
                        <td class="section" id="body_content"style="margin: 0;padding:0;">
                            <div class="text-item client-details text-center" style="margin: 0;padding:0;">
                                <h3 style="margin: 0;padding:0;"><b> Describe el serv./falla </b></h3>
                            </div>
                            <div class="details"  style="padding: 0;margin:0;margin-top: 0.5rem;margin-bottom: 0.5rem;">
                                @foreach ($comentarios as $comentario)
                                    @if ($comentario->estatus == 'Generar la solicitud' )
                                        <textarea name="" id="" cols="70" rows="2" readonly>{{$comentario->comentario}}</textarea>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h3 style="text-align: center;"><b> Fechas de Estatus </b></h3>
            <table class="container" align="center" style="margin-top: 1rem">
                <tbody>
                    <tr>
                        <td>
                            <b>Fecha Solicitado</b> <br>
                            {{$cotizacion->fecha_creacion}}
                        </td>
                        <td>
                            <b>Fecha Asignacion de taller</b> <br>
                            {{$cotizacion->fecha_asignacion_taller}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Fecha Ingreso a Taller</b> <br>
                            {{$cotizacion->fecha_ingreso_taller}}
                        </td>
                        <td>
                            <b>Fecha Cotizacion Recibida</b> <br>
                            {{$cotizacion->fecha_cotizacion}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Fecha Cotizacion Autorizada</b> <br>
                            {{$cotizacion->fecha_autorizada}}
                        </td>
                        <td>
                            <b>Fecha de Reparación</b> <br>
                            {{$cotizacion->fecha_reparado}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Fecha Entregado</b> <br>
                            {{$cotizacion->fecha_entregado}}
                        </td>
                        <td>
                            <b>Fecha Factura</b> <br>
                            {{$cotizacion->fecha_factura}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Fecha Pagado</b> <br>
                            {{$cotizacion->fecha_pagado}}
                        </td>
                    </tr>Evidencias del taller

                </tbody>
            </table>

            <h3 style="text-align: center;"><b> Evidencias del taller </b></h3><br>
            @foreach ($fotos as $foto)
            @if ($foto->estatus == 'Pendiente de autorización')
                @if ($foto == NULL)

                        <img id="blah" src="{{asset('/img/icon/seguros/page-not-found.png') }}" alt="Imagen" style="width: 90px;height: 90px;display:inline-bock;"/>
                @else
                    @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'mp4')
                            <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;display:inline-bock;">
                                <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$foto->imagen)}}" type='video/mp4'>
                            </video>
                    @elseif (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'mov')
                            <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;display:inline-bock;">
                                <source src="{{asset('/cotizacion/usuario'.$cotizacion->id_user.'/'.$foto->imagen)}}" type='video/mp4'>
                            </video>
                    @else

                        <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$foto->imagen) }}" alt="Imagen" style="width: 150px;height: 150px;display: inline-block;"/>
                    @endif
                @endif
            @endif
    @endforeach

            <h3 style="text-align: center;"><b> Cotización Aprobada </b></h3>

            @if (pathinfo($cotizacion->cotizacion_taller, PATHINFO_EXTENSION) == 'pdf')
            <div class="col-12">
                <iframe class="mt-2" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" style="width: 80%; height: 80px;"></iframe>
                <p class="text-center ">
                    <a class="btn btn-sm text-dark" href="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                </p>
            </div>
        @else
            <div class="col-6">
                <img id="blah" src="{{asset('/cotizacion/usuario'. $cotizacion->id_user . '/' .$cotizacion->cotizacion_taller) }}" alt="Imagen" style="width: 150px;height: 150px;"/>
            </div>
        @endif

            @if ($cotizacion->fecha_cotizacion != NULL)
                <div class="col-6">
                    <strong class="text-white">Importe total Total</strong>
                    <input class="form-control" type="number" value="{{ $cotizacion->total }}" disabled>
                </div>
                <div class="col-6">
                    <strong class="text-white">Total con IVA</strong>
                    <input class="form-control" type="number" value="{{ $cotizacion->total_iva }}" disabled>
                </div>
                <div class="col-6">
                    <strong class="text-white">IVA %</strong>
                    <input class="form-control" type="number" value="{{ $cotizacion->iva }}" disabled>
                </div>
            @endif

            <h3 style="text-align: center;"><b> Serivicios Autorizados </b></h3>
            <ul>
                @foreach ($cotizacion_serivicios as $cotizacion_serivicio)
                    <li>{{$cotizacion_serivicio->Servicio->familia}} / {{$cotizacion_serivicio->Servicio->servicio}} - <b>${{$cotizacion_serivicio->subtotal}}</b></li>
                @endforeach
            </ul>

            <h3 style="text-align: center;"><b> Encuesta </b></h3>
                @foreach ($fotos as $foto)
                    @if ($foto->estatus == 'Encuesta')
                        @if ($foto == NULL)
                        <img id="blah" src="https://checkn-go.com.mx/img/icon/seguros/page-not-found.png" alt="Imagen" style="width: 90px;height: 90px;"/>
                        @else
                            @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                                <div class="col-12">
                                    <iframe class="mt-2" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" style="width: 80%; height: 80px;"></iframe>
                                    <p class="text-center ">
                                        <a class="btn btn-sm text-dark" href="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                    </p>
                                </div>
                            @else
                                <div class="col-6">
                                    <img id="blah" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" alt="Imagen" style="width: 150px;height: 150px;"/>
                                </div>
                            @endif
                        @endif
                    @endif
                @endforeach

            <h3 style="text-align: center;"><b> INE </b></h3>
            @foreach ($fotos as $foto)
                @if ($foto->estatus == 'INE')
                    @if ($foto == NULL)
                    <img id="blah" src="https://checkn-go.com.mx/img/icon/seguros/page-not-found.png" alt="Imagen" style="width: 90px;height: 90px;"/>
                    @else
                        @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                            <div class="col-12">
                                <iframe class="mt-2" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" style="width: 80%; height: 80px;"></iframe>
                                <p class="text-center ">
                                    <a class="btn btn-sm text-dark" href="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                </p>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" alt="Imagen" style="width: 150px;height: 150px;"/>
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach

            <h3 style="text-align: center;"><b> Factura </b></h3>
            @foreach ($fotos as $foto)
                @if ($foto->estatus == 'Por cargar factura')
                    @if ($foto == NULL)
                    <img id="blah" src="https://checkn-go.com.mx/img/icon/seguros/page-not-found.png" alt="Imagen" style="width: 90px;height: 90px;"/>
                    @else
                        @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                            <div class="col-12">
                                <iframe class="mt-2" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" style="width: 80%; height: 80px;"></iframe>
                                <p class="text-center ">
                                    <a class="btn btn-sm text-dark" href="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                </p>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" alt="Imagen" style="width: 150px;height: 150px;"/>
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach

            <h3 style="text-align: center;"><b> Pago </b></h3>
            @foreach ($fotos as $foto)
                @if ($foto->estatus == 'Por pagar')
                    @if ($foto == NULL)
                    <img id="blah" src="https://checkn-go.com.mx/img/icon/seguros/page-not-found.png" alt="Imagen" style="width: 90px;height: 90px;"/>
                    @else
                        @if (pathinfo($foto->imagen, PATHINFO_EXTENSION) == 'pdf')
                            <div class="col-12">
                                <iframe class="mt-2" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" style="width: 80%; height: 80px;"></iframe>
                                <p class="text-center ">
                                    <a class="btn btn-sm text-dark" href="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" target="_blank" style="background: #836262; color: #ffff!important">Ver archivo</a>
                                </p>
                            </div>
                        @else
                            <div class="col-6">
                                <img id="blah" src="https://checkn-go.com.mx/cotizacion/usuario{{$cotizacion->id_user}}/{{$foto->imagen}}" alt="Imagen" style="width: 150px;height: 150px;"/>
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach

            <h3 style="text-align: center;"><b> Comentarios </b></h3>
            <table style="margin-top: 1rem">
                <thead>
                    <tr>
                        <th scope="col">Estatus</th>
                        <th scope="col">Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comentarios as $comentario)
                        <tr>
                            <td>
                                <h5> <b>{{$comentario->estatus}}</b></h5>
                            </td>
                            <td>
                                <h5> {{$comentario->fecha}} - {{$comentario->comentario}}</h5>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </body>
</html>
