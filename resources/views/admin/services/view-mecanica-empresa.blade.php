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
                        <th scope="col">Más</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mecanica_empresa as $item)
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
                            <td>{{ $item->Mecanica->fecha_servicio }}</td>
                            <td>{{ $servicio }}</td>
                            <td>{{ $item->UserEmpresa->name }}</td>
                            <td>{{ $item->Automovil->placas }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#example{{ $item->Mecanica->id }}"><img class=""
                                        src="{{ asset('img/icon/white/add.png') }}" width="15px"></a>
                            </td>
                            @include('admin.services.view-servicio-empresa')
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
