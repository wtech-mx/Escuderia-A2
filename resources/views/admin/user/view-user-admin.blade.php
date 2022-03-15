@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">
@endsection

@section('content')

@php
if(auth()->user()->empresa == 0){
    $usuarios = $user;
}else{
    $usuarios = $users_sector;
}
@endphp

    <div class="row bg-image">
        @include('admin.user.sector')

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Usuarios </strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12 mt-4 d-inline">

            <div class="d-flex justify-content-between">

                <a class="mt-1 ml-5 text-white " href="/exportar/usuarios">
                    <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                </a>

                @can('create_admin')
                <div class="content">
                    <a class="btn btn-circel" href="{{ route('create_admin.user') }}">
                        <i class="fas fa-plus-circle icon-effect"></i>
                    </a>

                    <a class="btn btn-circel" href="{{ route('create_admin.user') }}">
                        <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                            Agregar
                        </h5>
                    </a>
                </div>
                @endcan

                @if (auth()->user()->empresa == 1 && auth()->user()->id_sector == NULL)
                    <div class="content">
                        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                            style="background: transparent !important;" src>
                            <img class="" src="{{ asset('img/icon/white/sector.png') }}" width="25px">
                        </a>

                        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
                        style="background: transparent !important;">
                            <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                Sector
                            </h5>
                        </a>
                    </div>
                @endif
            </div>

        </div>


        @if (Session::has('success'))
            <script>
                Swal.fire(
                    'Exito!',
                    'Se ha guardado exitosamiente.',
                    'success'
                )

            </script>
        @endif

        <div class="content container-res-max">
            <div class="col-12 ">

                <table id="usuarios" class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            @if (auth()->user()->empresa == 0)
                                <th scope="col">Telefono</th>
                            @else
                                <th scope="col">Sector</th>
                                <th scope="col">Chofer</th>
                            @endif

                            <th scope="col" ><p class="d-none d-md-block"> fecha_nacimiento </p></th>
                            <th scope="col" ><p class="d-none d-md-block"> direccion </p></th>
                            <th scope="col" ><p class="d-none d-md-block"> referencia </p></th>
                            <th scope="col" ><p class="d-none d-md-block"> genero </p></th>
                            <th scope="col" ><p class="d-none d-md-block"> direccion </p></th>

                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($usuarios as $item)
                        @php
                            $fechaEntera = strtotime($item->updated_at);
                            $anio = date('Y', $fechaEntera);
                            $mes = date('m', $fechaEntera);
                            $dia = date('d', $fechaEntera);
                        @endphp
                            <tr>
                                @can('Editar Usuario')
                                    <td><a style="text-decoration: none;"
                                        href="{{ route('edit_admin.user', $item->id) }}">{{ $item->name }}</a>
                                    </td>
                                    @else
                                    <td>{{ $item->name }}</td>
                                @endcan

                                <td>{{ $item->email }}</td>
                                @if (auth()->user()->empresa == 0)
                                    <td>{{ $item->telefono }}</td>
                                @else
                                    <td>{{ $item->Sectores->sector }}</td>

                                    @if ($item->chofer == NULL)
                                    <td>No</td>
                                    @else
                                    <td>Si</td>
                                    @endif
                                @endif

                                    <td class=""><p class="d-none d-md-block"> {{ $item->fecha_nacimiento }} </p> </td>
                                    <td class=""><p class="d-none d-md-block"> {{ $item->direccion }} </p> </td>
                                    <td class=""><p class="d-none d-md-block"> {{ $item->referencia }} </p> </td>
                                    <td class=""><p class="d-none d-md-block"> {{ $item->genero }} </p> </td>
                                    <td class=""><p class="d-none d-md-block"> {{ $item->direccion }} </p> </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        {{-- {{ $user->render() }} --}}

    </div>

@section('js')

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });

    </script>

@endsection

@endsection
