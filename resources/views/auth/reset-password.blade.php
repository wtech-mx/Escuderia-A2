@extends('layouts.app')

@section('content')

           <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

          <form method="POST" action="{{ route('password.update') }}">
           @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="row bg-down-blue" >
                    <div class="col-md-12 mt-3 mb-3">
                        <div class="d-flex justify-content-center mt-2" >
                             <img  class="img-responsive" width="45%" src="{{ asset('img/logo-check.png') }}" alt="logo check go">
                        </div>
                    </div>

                    <div class="col-12p-5">

                        <h1 class="text-center text-white p-3">
                            <strong>Cambio de contraseña</strong>
                        </h1>

                        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{old('email', $request->email)}}" required autocomplete="email" autofocus placeholder="Email" >
                            <span class="focus-input100"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Enter password">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" value="{{old('password', $request->password)}}" required autocomplete="password" autofocus placeholder="password" >
                            <span class="focus-input100"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="wrap-input100 validate-input m-b-20 mt-3" data-validate="Escribe email">
                            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Repetor Contraseña">
                            <span class="focus-input100"></span>
                        </div>

                        <button class="btn btn-lg btn-is mt-3 mb-5 text-white" type="submit">
                            Recuperar
                        </button>

                    </div>
                </div>
           </form>

@endsection
