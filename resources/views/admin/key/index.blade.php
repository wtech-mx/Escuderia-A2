@extends('admin.layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/cupones.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

@endsection

@section('content')

        @if (Session::has('create'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha agragado la <b>Licencia</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/cupon.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Cupon IMG',
                })

            </script>
        @endif

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
                <strong>Llave</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="d-flex flex-row-reverse mt-4 mb-3">
            <a class="btn" data-toggle="modal" data-target="#modalLlave">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
            <h5 class="text-white p-2">
                Agregar
            </h5>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="content container-res-max">
                    <table id="keys" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">estatus</th>
                                <th scope="col">Caducidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($key as $item)
                                <tr>
                                    <th>
                                        <a style="text-decoration: none;"
                                            href="{{ route('edit.key', $item->id) }}">
                                            {{ $item->codigo }}
                                        </a>
                                    </th>
                                    <th>
                                        {{ $item->Empresa->name }}
                                    </th>

                                    <td>
                                        <input data-id="{{ $item->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $item->estatus ? 'checked' : '' }}>
                                    </td>
                                    <th>
                                            {{ $item->caducidad }}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.key.create')
    </div>


@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
     <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#keys').DataTable();
            $('.js-example-basic-single').select2();

        });

        $(function() {
            $('.toggle-class').change(function() {
                var estatus = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('ChangeLlave.key') }}',
                    data: {
                        'estatus': estatus,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })

    </script>

@endsection
@endsection
