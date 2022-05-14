@extends('admin.layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

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
                            <strong>Licencia de Conducir </strong>
                        </h5>

                        <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                            <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                        </div>
            </div>

            <div class="content container-res-max mt-5">
                <div class="col-12">

                    <table id="licencia" class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Cliente</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Expedicion</th>

                                <th scope="col" class="hidden_cont" ><p class="d-none d-md-block"> antiguedad </p></th>
                                <th scope="col" class="hidden_cont" ><p class="d-none d-md-block"> vigencia </p></th>
                                <th scope="col" class="hidden_cont" ><p class="d-none d-md-block"> nacionalidad </p></th>
                                <th scope="col" class="hidden_cont" ><p class="d-none d-md-block"> rfc </p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licencia as $item)
                                <tr>
                                    @can('Editar Licencia de Conducir')
                                        <th><a style="text-decoration: none;"
                                            href="{{ route('edit_admin.licencia', $item->id) }}">
                                            {{ $item->User->name }}</a>
                                        </th>
                                    @else
                                        <th>
                                            {{ $item->User->name }}
                                        </th>
                                    @endcan
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->expedicion }}</td>

                                        <td class="hidden_cont"><p class="d-none d-md-block"> {{ $item->antiguedad }} </p> </td>
                                        <td class="hidden_cont"><p class="d-none d-md-block"> {{ $item->vigencia }} </p> </td>
                                        <td class="hidden_cont"><p class="d-none d-md-block"> {{ $item->nacionalidad }} </p> </td>
                                        <td class="hidden_cont"><p class="d-none d-md-block"> {{ $item->rfc }} </p> </td>
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

    <script>
        $(document).ready(function() {
            $('#licencia').DataTable();
        });

    </script>

@endsection
@endsection
