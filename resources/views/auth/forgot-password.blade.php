@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">

           <form method="POST" action="{{ route('password.email') }}">
           @csrf

                <div class="row bg-down-blue" >
                    <div class="col-md-12 mt-3 mb-3">
                        <div class="d-flex justify-content-center mt-2" >
                             <img  class="img-responsive" width="45%" src="{{ asset('img/logo-check.png') }}" alt="logo check go">
                        </div>
                    </div>

                    <div class="col-12p-5">

                        <h1 class="text-center text-white p-3">
                            <strong>¿Olvidate tu contraseña?</strong>
                        </h1>

                        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" >
                            <span class="focus-input100"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button class="btn btn-lg btn-is mt-3 mb-5 text-white" type="submit">
                            Recuperar
                        </button>

                    </div>
                </div>
           </form>

@endsection
