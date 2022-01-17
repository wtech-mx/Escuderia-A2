<!DOCTYPE html>
    <html>
        <style type="text/css" media="screen">
            body{

            }
            .img-log{
                padding: 20px;
                width:50%;
            }

            .cotizacion{
                position: absolute;
                right: 3%;
                top: 0%;
                padding: 30px;
                font-size: 80px;
            }
            .fecha{
                right: 5%;
                padding: 35px;
            }
            .mensaje{
                padding: 20px 0px 0px 0px;
            }
            .from{
                font-size: 40px;
            }
            .para{
                font-size: 20px;
            }
            .tabla-completa{
                width: 100%;
                padding: 30px;
            }
            .tabla-azul{
                padding: 100px;
            }
            .tr{
                background-color: #1993B8;
                height: 40px;
            }
            td{
                height: 40px;
            }
            tbody{
                text-align: center;
                font-size: 120%;
            }
            .costos{
                position: absolute;
                right: 5%;
                padding: 30px;
                font-size: 20px;
            }
            .totalsub{
                padding: 30px;
            }
            .sub{
                padding: 30px;
            }
            .tota{
                padding: 30px;
            }
            .datos-contacto{
                font-size: 20px;
                text-decoration: none;
            }
            .gracias{
                position: absolute;
                right: 5%;
                padding: 30px;
                font-size: 30px;
            }
            .footer{

            }
            .pag{
                position: absolute;
                text-decoration: none;
                color: #191E25;
                left: 40%;
                display:block;
            }
            .container{
                z-index: 1000;
            }
            .padre {
                padding: 0 1rem;
            }
            .hijo_uno {
            /* IMPORTANTE */
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <body style="background-color: #191E25 ;">
            <div class="container">
                <div class="row" style="padding: 20px 0px 0px 0px;">
                    <div style="width: 50%; float:left">
                        <img alt="Bootstrap Image Preview" src="{{ asset('img/logoHeader.png') }}" style="width:80%; right: 5%;">
                    </div>
                    <div style="width: 35%; float:right">
                        <img alt="Bootstrap Image Preview" src="https://checkn-go.com.mx/img/logo-check.png" style="width:70%;">
                    </div>
                </div>

                <div class="padre">
                    <div class="hijo_uno">
                        <h3 style="color: #00d62e;font-size: 40px;">Remision</h3>
                    </div>
                </div>

                <div class="row" >
                    <div style="width: 50%; float:left">
                        <blockquote class="blockquote">
                            <p class="display-4 from" style="color: #00d62e;font-size: 25px;">
                                <strong>Datos del automovil </strong>
                            </p>
                            <p class="text-right  text-white" style="color: #ccc;font-size: 18px;">
                                Auto: {{$cotizacion->Cotizacion->User->Automovil->submarca}}
                            </p>
                            <p class="text-right  text-white" style="color: #ccc;font-size: 18px;">
                                Placas: {{$cotizacion->Cotizacion->User->Automovil->placas}}
                            </p>
                            <p class="text-right  text-white" style="color: #ccc;font-size: 18px;">
                                Kilometraje: {{$cotizacion->Cotizacion->km}} km
                            </p>
                        </blockquote>
                    </div>

                    <div style="width: 50%; float:right">
                        <blockquote class="blockquote">
                            <p class="display-4 from" style="color: #00d62e;font-size: 25px;">
                                <strong>Datos del cliente </strong>
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #ccc;font-size: 18px;">
                                Nombre: {{$cotizacion->Cotizacion->User->name}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #ccc;font-size: 18px;">
                                Telefono: {{$cotizacion->Cotizacion->User->telefono}}
                            </p>
                            <p class="blockquote-footer text-white para" style="color: #ccc;font-size: 18px;">
                                Correo: {{$cotizacion->Cotizacion->User->email}}
                            </p>
                        </blockquote>
                    </div>
                </div>



                <div class="row" style="position: relative;">
                    <div class="col-md-12">
                        <p style="color: #ccc;font-size: 25px; padding-left: 25px;">
                            <strong style="color: #00d62e">Fecha: </strong>{{$total_remision->fecha_remision}}
                        </p>
                        <table id="ejemplo" class="table text-white tabla-completa" style="color: #ffffff;width: 100%;padding: 30px;">
                            <thead class="tabla-azul" style="padding: 100px;">
                                <tr class="tr" style="background-color: #00d62e;height: 40px; color: #191E25;">
                                    <th >
                                        Reparaciòn
                                    </th>
                                    @foreach ($remision as $item)
                                        @if ($item->mano != NULL)
                                            <th>
                                                Mano de Obra
                                            </th>
                                        @endif
                                        @break
                                    @endforeach
                                    <th>
                                        Importe
                                    </th>
                                </tr>
                            </thead>

                            <tbody style="text-align: center;font-size: 120%;">
                                @foreach ($remision as $item)
                                <tr>
                                    <td>
                                        {{$item->reparacion}}
                                    </td>
                                    @if ($item->mano != NULL)
                                        <th>
                                            {{$item->mano}}
                                        </th>
                                    @endif
                                    <td>
                                        {{$item->importe}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row" style="padding: 0px 0px 20px 0px;position: relative;">
                            <div class="col-8">
                            </div>
                            <div class="col-4 mb-5">
                                <p style="color: #ccc;font-size: 25px; padding-left: 35px;">
                                    <strong style="color: #00d62e">Total </strong>${{$total_remision->total_remision}} mxn
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <address class="text-white datos-contacto" style="color: #ccc;font-size: 20px;text-decoration: none;">
                            <p>
                            <ul style="color: #ccc"> <p><strong>Nota: estos precios no Incluyen IVA</strong></p>
                                <li>Atentamente: Dir. Comercial Alejandro</li>
                                <li>Email: <a style="text-decoration: none;color:#fff" href="mailto:adiazm@eago.com.mx?subject=cotizacion" "email me">adiazm@eago.com.mx</a></li>
                                <li>Telefono:<a style="text-decoration: none;color:#fff" href="tel:56 20453763" title="">5620453763</a></li>
                            </ul>
                            </p><br>
                        </address>
                    </div>
                </div>
                <div class="contenedor-azul"style="background-color:#1993B8;position: absolute;width: 60%;height:1%;left: 20%;right: 20%;">
                </div>

                <div class="row footer">
                    <div class="col-md-12">
                        <h3 class="text-center text-white " style="color: #ccc">
                            <a  class="text-center text-white pag" href="https://checkn-go.com.mx" target="blank" title="pagina eago" style="position: absolute;text-decoration: none;color: #fff;left: 40%;display:block;">checkn-go.com.mx
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </body>
    </html>
