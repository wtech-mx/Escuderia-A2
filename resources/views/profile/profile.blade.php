@extends('layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
<p style="display: none">{{$userId = Auth::id()}}</p>


                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">


                <div class="row bg-profile" style="z-index: 1000">

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Datos de perfil</strong>
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
                            @if($user->img == NULL)
                                 <i class="fas fa-user" style="color: #FFFFFF;font-size: 100px"></i>
                            @else
                                <img class="rounded-circle" src="{{ asset('img-perfil/'.$user->img) }}" height="150px" width="150px">
                            @endif

                            <h4 class="text-center text-white">
                                <strong>{{$user->name}}</strong>
                            </h4>
                        </p>
                    </div>
                </div>

                <div class="row bg-down-image-border">

                    <div class="col-12 mt-5">

                                @if(Session::has('success'))
                                    <script>
                                        Swal.fire(
                                            'Exito!',
                                            'Se ha guardado exitosamiente.',
                                            'success'
                                        )
                                    </script>
                                @endif

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                  <li class="nav-item mr-2">
                                    <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true">
                                        Datos de perfil
                                    </a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link a-perso" id="pills-Seguridad-tab" data-toggle="pill" href="#pills-Seguridad" role="tab" aria-controls="pills-Seguridad" aria-selected="false">
                                        Seguridad
                                    </a>
                                  </li>

                                </ul>

                                <div class="tab-content" id="pills-tabContent">

                                  <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
                                    <form method="POST" action="{{route('update.user',$userId)}}" enctype="multipart/form-data" role="form">

                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <label for="">
                                         <p class="text-white"><strong>Nombre Completo</strong></p>
                                     </label>

                                        <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                 <img class="" src="{{ asset('img/icon/white/nombre.png') }}" width="25px" >
                                            </span>
                                        </div>

                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" style="border-radius: 0  10px 10px 0;">

                                         @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                        <label for="">
                                         <p class="text-white"><strong>Correo</strong></p>
                                     </label>

                                        <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                 <img class="" src="{{ asset('img/icon/white/email.png') }}" width="25px" >
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" style="border-radius: 0  10px 10px 0;">

                                         @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                        <label for="">
                                             <p class="text-white"><strong>Tel&eacute;fono</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/call.png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="55..." value="{{$user->telefono}}" style="border-radius: 0  10px 10px 0;">

                                             @if ($errors->has('telefono'))
                                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                            @endif
                                        </div>

                                        <label for="">
                                             <p class="text-white"><strong>Fecha de nacimiento</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text" >
                                                     <img class="" type="date" src="{{ asset('img/icon/white/calendario (2).png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='fecha_nacimiento' name="fecha_nacimiento" value="{{$user->fecha_nacimiento}}">

                                             @if ($errors->has('fecha_nacimiento'))
                                                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                                            @endif
                                        </div>

                                        <label for="">
                                             <p class="text-white"><strong>Direcci&oacute;n</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text" >
                                                     <img class="" src="{{ asset('img/icon/white/marcador-de-posicion.png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='direccion' name="direccion" value="{{$user->direccion}}">

                                             @if ($errors->has('Direccion'))
                                                <span class="text-danger">{{ $errors->first('Direccion') }}</span>
                                            @endif
                                        </div>

{{--                                        <label for="">--}}
{{--                                             <p class="text-white"><strong>Referencia</strong></p>--}}
{{--                                         </label>--}}

{{--                                        <div class="input-group form-group">--}}
{{--                                            <div class="input-group-prepend " >--}}
{{--                                                <span class="input-group-text" >--}}
{{--                                                     <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px" >--}}
{{--                                                </span>--}}
{{--                                            </div>--}}

{{--                                            <select class="form-control" id="referencia" name="referencia">--}}
{{--                                                @foreach($users as $item)--}}
{{--                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

                                        <label for="">
                                             <p class="text-white"><strong>G&eacute;nero</strong></p>
                                         </label>

                                        <div class="col-12 text-center">

                                            <div class="input-group form-group d-inline">

                                                <div class="d-flex justify-content-between">

                                                    <div class="form-check form-check-inline d-block">
                                                        @if($user->genero == 'Masculino')
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero" value="Masculino" checked>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero" value="Masculino">
                                                            </div>
                                                        @endif
                                                        <label class="form-check-label text-white" for="inlineRadio1">
                                                            Masculino
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline d-block">
                                                        @if($user->genero == 'Femenino')
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input  d-block" type="radio" name="genero" id="genero" value="Femenino" checked>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input  d-block" type="radio" name="genero" id="genero" value="Femenino">
                                                            </div>
                                                        @endif
                                                      <label class="form-check-label text-white" for="inlineRadio2">
                                                          Femenino
                                                      </label>
                                                    </div>

                                                    <div class="form-check form-check-inline d-block">
                                                        @if($user->genero == 'Otro')
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero" value="Otro" checked>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-center">
                                                                <input class="form-check-input d-block" type="radio" name="genero" id="genero" value="Otro" >
                                                            </div>
                                                        @endif
                                                      <label class="form-check-label text-white" for="inlineRadio3">
                                                          Otro
                                                      </label>
                                                    </div>

                                                </div>

                                            </div>

                                          </div>

                                        <label for="" class="mt-3">
                                                 <p class="text-white"><strong>Foto de Perfil</strong></p>
                                             </label>

                                        <div class="custom-file">
                                              <input type="file" class="custom-file-input"  id='img' name="img" value="{{$user->img}}">
                                              <label class="custom-file-label" for="img">Selecciona imagen</label>
                                            </div>

                                        <div class="col-12 text-center mt-3 " style="margin-bottom: 8rem !important;">
                                           <button class="btn btn-lg btn-save-neon text-white">
                                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                                  Actualizar
                                           </button>
                                        </div>
                                    </form>
                                  </div>

                                  <div class="tab-pane fade" id="pills-Seguridad" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                                    <form method="POST" action="{{route('update_password.user',$userId)}}" enctype="multipart/form-data" role="form" style="height: 500px;">


                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">

                                        <label for="">
                                            <p class="text-white"><strong>Contraseña</strong></p>
                                        </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/padlock.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <input type="password" class="form-control" placeholder="****" id="password" name="password" style="border-radius: 0  10px 10px 0;">
                                             @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <label for="">
                                         <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                                        </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                     <img class="" src="{{ asset('img/icon/white/password.png') }}" width="25px" >
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirmar Contraseña" id="password-confirm" style="border-radius: 0  10px 10px 0;">

                                             @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-12 text-center mt-3 "  style="margin-bottom: 8rem !important;">
                                            <button class="btn btn-lg btn-save-neon text-white">
                                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                                Actualizar
                                            </button>
                                        </div>

                                    </form>

                                  </div>

                                </div>

                    </div>

                </div>


@endsection

