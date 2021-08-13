<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        <h1>Cotización</h1>
        <hr>
        <div class="row">
            <div class="col-6">

            </div>
        </div>
        <div class="contenido">
            <h3>Datos Cliente</h3>
            @if ($cotizacion->id_user != NULL)
                <p>Cliente: {{$cotizacion->User->name}}</p>
                @elseif ($cotizacion->user != NULL)
                    <p>Cliente: {{$cotizacion->user}}</p>
                    @elseif ($cotizacion->id_empresa != NULL)
                        <p>Cliente: {{$cotizacion->Empresa->name}}</p>
                        @else
                            <p>Cliente: {{$cotizacion->empresa}}</p>
            @endif
            @if ($cotizacion->telefono != NULL)
                <p>Telefono: {{$cotizacion->telefono}}</p>
            @endif
            @if ($cotizacion->correo != NULL)
                <p>Correo: {{$cotizacion->correo}}</p>
            @endif
            <hr>


            <h3>Datos Servicio</h3>
            @foreach ($cotizacions as $item)
            <p>Servico: {{$item->servicio}}</p>
            <p>Pieza: {{$item->pieza}}</p>
            <p>Cantidad: {{$item->cantidad}}</p>
            <p>Mano de Obra: {{$item->mano_o}}</p>
            <br>
            @endforeach

            <hr>
            <p>Total: {{$cotizacion->total}}</p>
        </div>
    </body>
</html>
