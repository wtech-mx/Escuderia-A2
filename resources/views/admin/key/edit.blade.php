@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style=" min-height: 10vh">
            <div class="col-2 mt-5">
                <div class="d-flex justify-content-start">
                        <div class="text-center text-white">
                            <a href="{{ route('index.key') }}" style="background-color: transparent;clip-path: none">
                                <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                            </a>
                        </div>
                </div>
            </div>

            <div class="col-8 mt-5">
                        <h5 class="text-center text-white ml-4 mr-4 ">
                            <strong>Editar Llave</strong>
                        </h5>
            </div>

            <div class="col-2 mt-5">
                <div class="d-flex justify-content-start">
                        <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                            <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                        </div>
                </div>
            </div>
        </div>



        <div class="row  bg-down-image-border" >
            <div class="col-12">
                <form method="POST" action="{{ route('update.key', $key_update->id) }}" enctype="multipart/form-data" role="form">
                    @csrf

                    <input type="hidden" name="_method" value="PATCH">
                    <label class="mb-3 text-white">
                        <p><strong>Empresas</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);
                            border: none;">
                                <i class="fas fa-user-tag icon-users-edit"></i>
                            </span>
                        </div>

                        <select class="form-control" id="id_empresa" name="id_empresa">
                            <option value="{{ $key_update->id_empresa }}">Seleccione empresa</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="mt-3 text-white">
                                <p><strong>Llave</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <input class="form-control" id="codigo" name="codigo" value="{{$key_update->codigo}}">
                            </div>
                        </div>

                        <div class="col-6 text-white">
                            <label class="mt-3">
                                <p><strong>Fecha Caducidad</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <input type="date" class="form-control" id="caducidad" name="caducidad" value="{{$key_update->caducidad}}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="estatus" name="estatus" value="1">

                    <button class="btn btn-lg btn-success btn-save-neon text-white"
                        style="margin-bottom: 1rem !important;">
                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                        Guardar
                    </button>

                </form>
            </div>
        </div>
@endsection
