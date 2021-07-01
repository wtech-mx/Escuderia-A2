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
                <strong>Asignación de Usuarios</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>

        <div class="col-6 mt-4">
            <a class="btn mb-3 mr-1" href="#carouselExampleControls" role="button" data-slide="prev">
                <img class="" src="{{ asset('img/icon/white/flecha-izquierda.png') }}" width="25px">
            </a>

            <a class="btn mb-3 " href="#carouselExampleControls" role="button" data-slide="next">
                <img class="" src="{{ asset('img/icon/white/flecha-correcta.png') }}" width="25px">
            </a>
        </div>

        <div class="col-12 mb-3">
            <h5 class="text-center text-white ml-4 mr-4 ">
                @foreach ($cupon as $item)
                 Usuarios en cupon: <a class="text-center mb-5" style="color: #00d62e; font: normal normal bold 15px/27px Segoe UI;"><strong>{{$item->titulo }}</strong></a>
                @endforeach
            </h5>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="90000">
            <div class="carousel-inner">
                {{-- -------------------------------------------------------------------------- --}}
                {{-- |Visualizacion de Usuarios --}}
                {{-- |-------------------------------------------------------------------------- --}}
                <div class="carousel-item active">
                    <div class="col-12">
                        <div class="row">
                            <div class="content container-res-max">
                                <table id="cupones" class="table text-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Check</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cupon_user as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->User->name }}
                                                </td>
                                                <td>
                                                    {{ $item->check }}
                                                </td>
                                                <td>
                                                    {{ $item->updated_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- -------------------------------------------------------------------------- --}}
                {{-- |Asignacion de Usuarios --}}
                {{-- |-------------------------------------------------------------------------- --}}

                    <div class="carousel-item ">
                        <div class="row">
                            <div class="content container-res-max">
                                <div class="col-12">
                                    <form method="POST" action="{{ route('update_asignacion.cupon') }}" enctype="multipart/form-data" role="form">
                                        @csrf

                                        <input type="hidden" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}">
                                        <input type="hidden" class="form-control" name="id_cupon" id="id_cupon" value="{{$item->id}}">

                                        <label for="">
                                            <p class="text-white"><strong>Seleccione Usuario</strong></p>
                                        </label>

                                        <div class=" form-group mb-5">
                                            <select class="form-control js-example-basic-single col-12" id="id_user" name="id_user">
                                                @foreach ($user as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button class="btn btn-success btn-save-neon text-white">
                                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                                            Guardar
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

    </script>

@endsection
@endsection
