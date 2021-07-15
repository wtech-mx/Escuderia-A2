@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-image">


        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.cupon') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8 mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Role y Permisos</strong>
            </h5>
        </div>

        <div class="col-2 mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


        <div class="content container-res-max">
            <div class="col-12 mt-5">
                <form method="POST" action="{{ route('update_role.role', $role->id ) }}" enctype="multipart/form-data" role="form">
                    @csrf

                    <label for="">
                        <p class="text-white"><strong>Nombre</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-signature icon-tc"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}">
                    </div>
                    {{dd($role->RolePermissions)}}
                    @foreach ($role->RolePermissions as $item)
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $item->id }}" />
                        <label class="form-check-label text-white" for="flexCheckDefault">
                            {{ $item->name }}
                        </label>
                    @endforeach

                    @foreach ($role_permiso as $item)
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $item->id }}" />
                        <label class="form-check-label text-white" for="flexCheckDefault">
                            {{ $item->name }}
                        </label>
                    @endforeach



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
