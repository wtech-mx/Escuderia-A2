@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-image">

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
                <strong>Roles y Permisos</strong>
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

            <div class="content">
                <a class="btn btn-circel" href="{{ route('create_role.role') }}">
                    <i class="fas fa-plus-circle icon-effect"></i>
                </a>

                <a class="btn btn-circel" href="{{ route('create_role.role') }}">
                    <h5 class="text-white text-tittle-app  mt-2 " style="font: normal normal bold 13px/20px Segoe UI">
                        Agregar
                    </h5>
                </a>

            </div>
        </div>

    </div>


    <div class="row bg-image">
        <div class="content container-res-max">
            <div class="col-12 mt-5">

                <table id="licencia" class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">nombre</th>
                            <th scope="col">acciones</th>
                            <th scope="col">fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $item)
                            <tr>
                                <td>{{ $item->name }}
                                </td>
                                <td>
                                    <a href="{{ route('edit_role.role', $item->id ) }}">
                                        <i class="fas fa-edit icon-users-edit" style="font-size: 15px;"></i>
                                    </a>
                                </td>
                                <td>{{ $item->created_at }}</td>
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
            $('#licencia').DataTable();
        });

    </script>

@endsection
@endsection
