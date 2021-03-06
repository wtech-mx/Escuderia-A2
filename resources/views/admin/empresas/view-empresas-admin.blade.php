@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')


    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-down-blue" style="border-radius: 0 0 0 0;">


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
                <strong>Empresas</strong>
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
            <div class="d-flex flex-row-reverse">

                <a class="mt-1 ml-5 text-white " href="/exportar/empresas">
                    <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                </a>

                <div class="content">
                    <a class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                        <h5 class="text-white text-tittle-app mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                            Agregar
                        </h5>
                    </a>

                    <a class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                        <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px">
                    </a>
                </div>
            </div>
        </div>
        <div class="row ml-2 mr-2">

            @if (Session::has('success'))
                <script>
                    Swal.fire(
                        'Exito!',
                        'Se ha guardado exitosamente.',
                        'success'
                    )

                </script>
            @endif

            <div class="content container-res-max">
                <div class="col-12 ">

                    <table id="empresa" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresa as $item)
                                <tr>
                                    <td><a style="text-decoration: none;"
                                            href="{{ route('edit_admin.empresa', $item->id) }}">{{ $item->name }}</a>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telefono }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#empresa').DataTable();
        });

    </script>

@endsection

@endsection
