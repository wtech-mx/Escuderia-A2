@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
<div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('edit_check.cupon', $cupon->id) }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Listado</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="text-center text-white mt-5 mb-5">
                    <h2>Listado de personas que ocuparon el cupon</h2>
                    @foreach ($cupons as $item)
                        <h2 style="color: #00d62e;"><strong>{{ $item->titulo }}</strong></h2>
                    @endforeach
                </div>
                <div class="content container-res-max">
                    <table id="lista" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha de uso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cupons as $item)
                                <?php
                                $originalDate = $item->updated_at;
                                $newDate = date("d/m/Y", strtotime($originalDate));
                                ?>
                                <tr>
                                    <th><a style="text-decoration: none;">
                                        {{$item->User->name}}</a>
                                    </th>
                                    <th><a style="text-decoration: none;">
                                        {{$newDate}}</a>
                                </th>
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
            $('#lista').DataTable();
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
