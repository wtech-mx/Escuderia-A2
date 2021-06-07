<div class="col-12">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="60000">
        <div class="carousel-inner">

            {{-- -------------------------------------------------------------------------- --}}
            {{-- |Servicios Llantas --}}
            {{-- |-------------------------------------------------------------------------- --}}

            <div class="carousel-item active">
                <h5 class="text-center text-white mt-4 ml-4 mr-4 ">
                    <strong>Servicios</strong>
                </h5>

                <div class="row">

                    <div class="carousel-item active">

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Servicio</th>
                                                <th scope="col">Auto</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Más</th>
                                                {{-- <th scope="col">Estatus</th> --}}
                                            </tr>
                                        </thead>
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

                                                <tbody>
                                                    <tr>
                                                        <td>{{ $item->Mecanica->fecha_servicio }}</td>
                                                        <td>{{ $servicio }}</td>

                                                        <td>{{ $item->User->name }}</td>
                                                        <td>{{ $item->Automovil->placas }} <br>
                                                            {{ $item->Automovil->submarca }}</td>
                                                        @include('admin.services.view-servicio')
                                                        <td>
                                                            <a data-toggle="modal"
                                                                data-target="#example{{ $item->Mecanica->id }}"><img class=""
                                                                    src="{{ asset('img/icon/white/add.png') }}"
                                                                    width="15px"></a>
                                                        </td>
                                                        {{-- @if ($item->check == 0) --}}
                                                        {{-- <td><img class="" src="{{ asset('img/icon/white/cancelar (1).png') }}" width="15px" ></td> --}}
                                                        {{-- @else --}}
                                                        {{-- <td><img class="" src="{{ asset('img/icon/color/comprobado.png') }}" width="15px" ></td> --}}
                                                        {{-- @endif --}}
                                                    </tr>
                                                </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>
