@extends('layouts.app')

@section('content')

                <div class="row bg-img-log" style="background-image: url({{ asset('img/bg-log.png') }});">
                    <div class="col-md-12 p-5">

                        <h1 class="text-left mb-3 titulo-welcome">
                            Bienvenido
                        </h1>

                        <h5 class="text-left titulo-subtitle ">
                            EAGO TU SOLUCION
                        </h5>

                        <div class="d-flex justify-content-center mt-5" >
                            <img class="img-responsive" width="45%" src="https://eago.com.mx/general/1595621309.png" />
                        </div>

                    </div>

                    <div class="divider" style="position: absolute;top: 78%">
                        <svg  preserveAspectRatio="none" viewBox="0 0 1900 125" class="d-block" width="150%" height="200px" style="z-index: 1000;position: relative">
                         <path d="m1800 0v50h-1800z" fill="#050f55"></path>
                        </svg>
                    </div>

                </div>

                <div class="row bg-down-blue">
                    <div class="col-12 " style="margin-top: 115px">

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-lg  btn-perzonalizado-gradient text-white mb-3" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a class=" btn btn-lg btn-perzonalizado-white text-dark mb-5" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>

                    </div>
                </div>

@endsection


