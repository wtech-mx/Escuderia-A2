@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="row bg-down-image-border">


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
                <strong>Notas</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="row  bg-down-image-border">
            <div class="content container-res-max">
                <div class="col-12">

                    <div class="d-flex flex-row-reverse">
                        <div class="mt-5 mb-2">
                            <a class="btn " data-toggle="modal" data-target="#modalNotas">
                                <i class="fa fa-plus-circle icon-effect-sm" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <div class="container-res-max">
                            <table id="notas" class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Más</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notas as $item)
                                        @php
                                            $recorte = substr($item->nota, 0, 15);
                                        @endphp
                                        <tr>
                                            <td>{{ $item->User->name }}</td>
                                            <td>{{ $recorte }}...</td>
                                            <td>
                                                <a type="button" class="btn text-white" data-toggle="modal"
                                                    data-target="#modalNotasUpdate{{ $item->id }}"
                                                    style="background: transparent !important;">
                                                    <i class="fas fa-edit icon-users-edit" style="font-size: 15px;"></i>
                                                </a>

                                                <a type="button" class="btn text-white" data-toggle="modal"
                                                    data-target="#modal-{{ $item->id }}">
                                                    <i class="fas fa-trash icon-users-edit" style="font-size: 15px;"></i>
                                                </a>

                                            </td>
                                            @include('admin.notas.update')
                                            @include('admin.notas.destroy')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('admin.notas.modal')
                    </div>


                </div>
            </div>

        </div>
    </div>

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#notas').DataTable();
        });

    </script>

@endsection

@endsection
