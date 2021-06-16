@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
    <div class="row  bg-image">
        <div class="row bg-profile" style="z-index: 100000">
            @if (Session::has('success'))
                <script>
                    Swal.fire({
                        title: 'Exito!!',
                        html: 'Se ha editado el <b>Cupon</b>, ' +
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

            <div class="col-2">
                <div class="d-flex justify-content-start">
                    <div class="text-center text-white">
                        <a href="{{ route('index_admin.cupon') }}" style="background-color: transparent;clip-path: none">
                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <h5 class="text-center text-white ml-4 mr-4 ">
                    <strong> Editar Cupon </strong>
                </h5>
            </div>

            <div class="col-2">
                <div class="d-flex justify-content-start">
                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                        <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                    </div>
                </div>
            </div>
        </div>


        <div class="content container-res-max">
            <div class="col-12">
                <div class="text-center text-white mt-5 mb-5">
                    <h2>Cupon</h2>
                    <h2 style="color: #00d62e;"><strong>{{ $cupons->titulo }}</strong></h2>
                </div>
                <p class="text-white">{{ $cupons->precio }}</p>
                <p class="text-white">{{ $cupons->validez }}</p>
                <p class="text-white  mb-5">{{ $cupons->aplicacion }}</p>
                <form method="POST" action="{{ route('update_check.cupon', $cupons->id) }}" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                    <select class="form-control js-example-basic-single" id="id_user" name="id_user">
                        @foreach ($cupons_user as $item)
                            <option value="{{ $item->id }}">{{ $item->User->name }}</option>
                        @endforeach
                    </select>


                    <div class="col-12 mt-5">
                        <button class="btn btn-lg btn-success btn-save-neon text-white"
                            style="margin-bottom: 15rem !important;">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

@endsection
