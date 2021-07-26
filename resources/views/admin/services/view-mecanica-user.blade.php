<div class="carousel-inner">
    <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
        <strong>Servicios</strong>
    </h5>

    <div class="row">
        <div class="col-12">
            <table id="servicio" class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Auto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mecanica_usuario as $item)
                        @php
                            switch ($item) {
                                case $item->Mecanica->servicio == '1':
                                    $servicio = 'Llanta';
                                    break;
                                //Banda
                                case $item->Mecanica->servicio == '2':
                                    $servicio = 'Banda';
                                    break;
                                //Frenos
                                case $item->Mecanica->servicio == '3':
                                    $servicio = 'Freno';
                                    break;
                                //Aceite
                                case $item->Mecanica->servicio == '4':
                                    $servicio = 'Aceite';
                                    break;
                                //Afinacion
                                case $item->Mecanica->servicio == '5':
                                    $servicio = 'Afinación';
                                    break;
                                //Amorting
                                case $item->Mecanica->servicio == '6':
                                    $servicio = 'Amortiguadores';
                                    break;
                                //Bateria
                                case $item->Mecanica->servicio == '7':
                                    $servicio = 'Bateria';
                                    break;
                                case $item->Mecanica->servicio == '8':
                                    $servicio = 'Otro';
                                    break;
                            }
                        @endphp
                        <tr>
                            <td><a style="color: #3490dc" data-toggle="modal" data-target="#example{{ $item->Mecanica->id }}">{{ $item->Mecanica->fecha_servicio }}</a></td>
                            <td>{{ $servicio }}</td>
                            <td>{{ $item->User->name }}</td>
                            <td>{{ $item->Automovil->placas }}</td>
                            @include('admin.services.view-servicio')
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
