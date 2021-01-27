@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/login-estilos.css') }}" rel="stylesheet">

    <div class="container-login100" >
		<div class="wrap-login100">

            <div class="container-fluid">

                <div class="row  bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">

                    <div class="col-md-12 p-5">

                        <h1 class="text-left mb-3 titulo-welcome">
                            Bienvenido
                        </h1>

                        <h5 class="text-left titulo-subtitle ">
                            EAGO TU SOLUCION
                        </h5>

                        <div class="d-flex justify-content-center" style="margin-top: 6rem !important;">
                            <img class="img-responsive" width="45%" src="https://eago.com.mx/general/1595621309.png" />
                        </div>

                    </div>

                    <svg  preserveAspectRatio="none" viewBox="0 0 1900 95" class="d-block" width="180%" height="150px">
                        <path d="m1800 0v50h-1800z" fill="#050f55"></path>
                    </svg>

                </div>



                <div class="row bg-down-blue">

                    <div class="col-md-12 text-center p-5">

                        <div class="d-flex justify-content-center mb-2">
                            <a class="d-block btn  btn-lg  btn-perzonalizado-gradient text-white" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </div>

                        <div class="d-flex justify-content-center ">
                            <a class="d-block btn  btn-lg btn-perzonalizado-white text-dark" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>

                    </div>
                </div>
            </div>

		</div>
	</div>

@endsection


