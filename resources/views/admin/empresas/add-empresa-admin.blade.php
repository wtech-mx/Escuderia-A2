@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
<p style="display: none">{{$userId = Auth::id()}}</p>


                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
                <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">


                <div class="row bg-profile" style="z-index: 100000">

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index_admin.empresa') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Empresa</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-12 p-3">
                        <p class="text-center">
                             <img class="img-thumbnail" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="150px" style="padding: 20px;border-radius: 10px">

                            <h4 class="text-center text-white">
                                <strong>Nombre</strong>
                            </h4>
                        </p>
                    </div>
                </div>


                <div class="row bg-down-image-border">
                        <div class="col-12 mt-5">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                              <li class="nav-item mr-2">
                                <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true" >
                                    Datos de perfil
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link a-perso" id="pills-Seguridad-tab" data-toggle="pill" href="#pills-Seguridad" role="tab" aria-controls="pills-Seguridad" aria-selected="false">
                                    Seguridad
                                </a>
                              </li>

                            </ul>

                            <form method="POST" action="{{route('store_admin.empresa')}}" enctype="multipart/form-data" role="form">
                            @csrf

                            <div class="tab-content" id="pills-tabContent">

                              <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">

                                 <label for="" class="mt-2">
                                     <p class="text-white"><strong>Empresa</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" >
                                </div>

                                 <label for="" class="mt-2">
                                     <p class="text-white"><strong>Correo</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/email.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="correo@correo.com" id="email" name="email" >
                                </div>

                                 <label for="" class="mt-2">
                                     <p class="text-white"><strong>Tel&eacute;fono</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/call.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="55 5555-0000" id="telefono" name="telefono" >
                                </div>


                                 <label for="" class="mt-2">
                                     <p class="text-white"><strong>Direcci&oacute;n</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal"  >
                                             <img class="" src="{{ asset('img/icon/white/marcador-de-posicion.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Direccion"  id="direccion" name="direccion">
                                </div>

                                 <label for="" class="mt-2">
                                     <p class="text-white"><strong>Referencia</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal"  >
                                             <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px" >
                                        </span>
                                    </div>

                                        <select class="form-control" id="referencia" name="referencia">
                                            <option>Selecione Referencia</option>
                                            @foreach($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <label for="" class="mt-2">>
                                    <p class="text-white"><strong>Role</strong></p>
                                </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-tag icon-users-edit"></i>
                                        </span>
                                    </div>

                                    <select class="form-control" id="role" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                  <label for="" class="mt-3">
                                      <p class="text-white"><strong>Foto de Perfil</strong></p>
                                  </label>

                                  <div class="custom-file " style="margin-bottom: 8rem !important;">
                                      <input type="file" class="custom-file-input"  id='img' name="img" >
                                  </div>

                              </div>

                              <div class="tab-pane fade" id="pills-Seguridad" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                                 <label for="">
                                     <p class="text-white"><strong>Contraseña</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/padlock.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="****" id="password" name="password" >
                                </div>

                                 <label for="" class="mt-5">
                                     <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                                 </label>

                                <div class="input-group form-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/password.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña" id="password-confirm" >
                                </div>

                                  <div class="col-12 text-center mt-5 " style="margin-bottom: 9rem !important;">

                                      <button class="btn btn-lg btn-save-neon text-white">
                                          <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                          Actualizar
                                      </button>

                                  </div>

                              </div>

                            </div>
                     </form>

                        </div>
                    </div>


@endsection

