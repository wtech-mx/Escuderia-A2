@extends('template')
@section('bg-color', 'background-color: rgb(0,131,28,1);')
@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-down-blue" style="border-radius: 0 0 0 0;" >

                    <div class="col-12 mt-5">
                        <div class="d-flex justify-content-center " >
                             <img  class="img-responsive" width="auto" src="{{ asset('img/logo-check.png') }}" alt="logo check go">
                        </div>
                    </div>

                    <div class="col-12 mt-5 mr-5 ml-5 content_adapt_300">

                       <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 class="text-center text-white p-3">
                                <strong>Iniciar sesi&oacute;n.</strong>
                            </h1>

                            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                <span class="focus-input100"></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Enter username or email">
                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                <span class="focus-input100"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <style>
                                .form-check-input:checked {
                                    background-color: #00f936;
                                    border-color: #00f936;
                                }
                            </style>

                            <div class="form-group row p-4 ">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-is mt-3 text-dark" type="submit">
                                Iniciar sesi&oacute;n
                            </button>

                            <p class="text-center mt-3">
                                <a  class="text-center " href="{{ route('password.email') }}" style="color: #FFFFFF">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </p>

                            <div class="d-flex justify-content-center">

                                <a href="#" class="login100-social-item">
                                    <img src="{{ asset('img/icon/facebook.png') }}" alt="Facebook">
                                </a>

                                <a href="#" class="login100-social-item">
                                    <img src="{{ asset('img/icon/icon-google.png') }}" alt="GOOGLE">
                                </a>

                            </div>

                            <p class="text-center mt-3 text-white" style="margin-bottom: 50%;">
                                ¿No tienes una cuenta?
                                <a  class="text-center " href="{{ route('register') }}" style="color: #00f936">Reg&iacute;strate</a>
                            </p>

                       </form>

                    </div>

                </div>


@endsection
