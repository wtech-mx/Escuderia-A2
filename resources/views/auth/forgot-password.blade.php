@extends('template')

@section('content')

           <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

           <form method="POST" action="{{ route('password.email') }}">

           @csrf

                <div class="row bg-down-blue " style="border-radius: 0 0 0 0;">

                    <div class="col-md-12  mb-2"  style="margin-top: 180px">
                        <div class="d-flex justify-content-center mt-2" style="margin-bottom: 50px" >
                             <img  class="img-responsive" width="45%" src="{{ asset('img/logo-check.png') }}" alt="logo check go">
                        </div>
                    </div>

                    <div class="col-12 p-5 content_adapt_300">

                        <h1 class="text-center text-white p-3" style="margin-bottom: 50px">
                            <strong>¿Olvidate tu contraseña?</strong>
                        </h1>

                        <div class="wrap-input100 validate-input mb-2" data-validate="Enter email" >
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" >
                            <span class="focus-input100"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button class="btn btn-lg btn-is mt-2  text-white" type="submit" style="margin-bottom: 230px">
                            Recuperar
                        </button>

                        <p class="text-center text-white">
                            <a  class="text-center " href="{{ route('login') }}" style="color: #00f936">Iniciar sesion</a>
                        </p>

                    </div>
                </div>
           </form>

@endsection
