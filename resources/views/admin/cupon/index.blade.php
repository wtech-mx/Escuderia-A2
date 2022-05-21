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
                    html: 'Se ha agragado el <b>Cupon</b>, ' +
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

        @if (Session::has('asignacion'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: ' Se ha asignacion el  <b>Cupon</b>, ' +
                        ' al usuario Exitosamente',
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

        @include('admin.layouts.sidebar')

        <div class="col-10">

         <div class="d-flex justify-content-between mt-5  mb-5">
                    <div class="text-center text-white">
                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>

                    <h5 class="text-center text-white ml-4 mr-4 ">
                        <strong>Cupones</strong>
                    </h5>

                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
         </div>

        @can('Crear Cupones')
            <div class="d-flex flex-row-reverse mt-4 mb-3">
            <a class="btn p-2 " href="{{ route('create_admin.cupon') }}">
                <i class="fas fa-plus-circle icon-effect"></i>
            </a>
            <h5 class="text-white p-2">
                Agregar
            </h5>
        </div>
        @endcan

        <div class="col-12">
            <div class="row">

                    <table id="cupones" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">estado</th>
                                <th scope="col">Acciones</th>
                                <th scope="col">Check</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cupon as $item)
                                <tr>
                                    @can('Editar Cupones')
                                    <th>
                                        <a style="text-decoration: none;"
                                            href="{{ route('edit_admin.cupon', $item->id) }}">
                                            {{ $item->titulo }}
                                        </a>
                                    </th>
                                    @else
                                    <th>
                                            {{ $item->titulo }}
                                    </th>
                                    @endcan

                                    <td>
                                        <input data-id="{{ $item->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $item->estado ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a type="button" class="text-white" data-toggle="modal"
                                            data-target="#example{{ $item->id }}"
                                            style="background: transparent !important; padding: 1px;">
                                            <i class="fa fa-eye icon-users-edit" style="font-size: 15px;"></i>
                                        </a>

                                        @can('Eliminar Cupones')
                                            <a type="button" class="text-white" data-toggle="modal"
                                                data-target="#modaleliminar{{ $item->id }}">
                                                <i class="fas fa-trash icon-users-edit" style="font-size: 15px;"></i>
                                            </a>
                                        @endcan

                                        <a href="{{ route('edit_asignacion.cupon', $item->id) }}">
                                            <i class="fas fa-users icon-users-edit" style="font-size: 15px;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit_check.cupon', $item->id) }}">
                                            <i class="fas fa-list icon-users-edit" style="font-size: 15px;"></i>
                                        </a>
                                    </td>
                                    @include('admin.cupon.modal')
                                    @include('admin.cupon.eliminar')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>

    </div>


@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
     <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#cupones').DataTable();
            $('.js-example-basic-single').select2();

        });

        $(function() {
            $('.toggle-class').change(function() {
                var estado = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('ChangeUserStatus.cupon') }}',
                    data: {
                        'estado': estado,
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
