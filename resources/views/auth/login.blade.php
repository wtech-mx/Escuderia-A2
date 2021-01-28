@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

                <div class="row bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">
                    <div class="col-md-12 mt-3 mb-3">

                        <div class="d-flex justify-content-center mt-2" >
                            <img class="img-responsive" width="45%" src="https://eago.com.mx/general/1595621309.png" />
                        </div>

                    </div>
                </div>

           <form method="POST" action="{{ route('login') }}">
           @csrf

                <div class="row bg-down-blue" style="border-radius: 30px 30px 0 0">
                    <div class="col-12 p-5">

                        <h1 class="text-center text-white p-3">
                            <strong>Iniciar sesion</strong>
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

                        <button class="btn btn-lg btn-is mt-3 text-white" type="submit">
                            Iniciar sesion
                        </button>

                        <p class="text-center mt-3">
                            <a  class="text-center " href="{{ route('password.request') }}" style="color: #FFFFFF">
                                Olvidaste tu contraseña?
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

                        <p class="text-center mt-3 text-white">
                            No tienes una cuenta?
                            <a  class="text-center " href="{{ route('register') }}" style="color: #0092c5">Registrate</a>
                        </p>

                    </div>
                </div>
           </form>

@endsection
