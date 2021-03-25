@extends('layouts.app')
@section('bg-color', 'background-color: rgb(0,131,28,1);')
@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">
                    <div class="col-md-12 mt-3 mb-3">

                        <div class="d-flex justify-content-center mt-2" >
                            <img class="img-responsive" width="45%" src="{{ asset('img/logo-check.png') }}" />
                        </div>

                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}" style="">
           @csrf

                <div class="row bg-down-blue" style="">
                    <div class="col-12 p-5">

                        <h1 class="text-center text-white p-3">
                            <strong>Registro</strong>
                        </h1>

{{--                         <input id="role" type="hidden" name="role" value="0">--}}

                        <div class="wrap-input100 validate-input m-b-20" data-validate="Escribe Nombre">
                            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Nombre">
                            <span class="focus-input100"></span>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Escribe email">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">
                            <span class="focus-input100"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Escribe email">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Contraseña">
                            <span class="focus-input100"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Escribe email">
                            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Repetir Contraseña">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="d-flex justify-content-between m-b-20 mt-5">

                            <div class="form-check form-check-inline ">
                              <input class="form-check-input" type="radio" name="radio" id="radio" value="radio" required>
                              <label class="form-check-label text-white" for="inlineRadio1">Estoy de acuerdo</label>
                            </div>

                            <p>
                              <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: #00f936">
                                Ver terminos y condiciones
                              </a>
                            </p>

                        </div>

                        <style>
                            .form-check-input:checked {
                                background-color: #00f936;
                                border-color: #0E7E27;
                            }
                        </style>

                            <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                @include('auth.terminos')
                              </div>
                            </div>



                        <button class="btn btn-lg btn-is mt-3 text-white" type="submit">
                            Iniciar sesion
                        </button>


                        <div class="d-flex justify-content-center p-5">

                            <a href="#" class="login100-social-item">
                                <img src="{{ asset('img/icon/facebook.png') }}" alt="Facebook">
                            </a>

                            <a href="#" class="login100-social-item">
                                <img src="{{ asset('img/icon/icon-google.png') }}" alt="GOOGLE">
                            </a>

                        </div>

                        <p class="text-center mt-3 text-white">
                            Ya tienes una cuenta?
                            <a  class="text-center " href="{{ route('login') }}" style="color: #00f936">Iniciar sesion</a>
                        </p>

                    </div>
                </div>
           </form>

@endsection
