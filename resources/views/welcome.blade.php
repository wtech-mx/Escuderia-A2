@extends('template')

@section('content')



    <div class="row bg-down-blue" style="border-radius: 0px;background: #191E25 0% 0% no-repeat padding-box;height: 50vh !important; overflow: hidden!important;">

        <div class="col-md-12" style="margin-top: 160px">

{{--            <h1 class="text-left mb-5 titulo-welcome">--}}
{{--                Bienvenido--}}
{{--            </h1>--}}

            <div class="d-flex justify-content-center mt-5" >
                <img  class="img-responsive" width="75%" src="{{ asset('img/logo-check.png') }}" alt="logo check go">
            </div>

        </div>

{{--        <div class="divider" style="position: absolute;top: 63%">--}}
{{--            <svg  preserveAspectRatio="none" viewBox="0 0 1900 125" class="d-block" width="150%" height="52vh" style="z-index: 1000;position: relative">--}}
{{--                <path d="m1800 0v50h-1800z" fill="#191E25"></path>--}}
{{--            </svg>--}}
{{--        </div>--}}

    </div>

    <div class="row bg-down-blue" style="border-radius: 0px;background: #191E25 0% 0% no-repeat padding-box;height: 50vh !important; overflow: hidden!important;">
        <div class="col-12 " style="margin-top: 165px">

            <div class="d-flex justify-content-center">
                            <a class="btn btn-lg  btn-perzonalizado-gradient text-dark mb-3" href="{{ route('login') }}">
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


