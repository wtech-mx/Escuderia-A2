@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="bg-down-image-border" style=" min-height: 10vh">
            <div class="row">
                <div class="col-2 mt-5">
                    <div class="d-flex justify-content-start">
                            <div class="text-center text-white">
                                @if (Auth::check() == true)
                                    @if (auth()->user()->role != 0)
                                        <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    @else
                                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    @endif
                                @endif
                            </div>
                    </div>
                </div>

                <div class="col-8 mt-5">
                            <h5 class="text-center text-white ml-4 mr-4 ">
                                <strong>Videos del Automovil</strong>
                            </h5>
                </div>

                <div class="col-2 mt-5">
                    <div class="d-flex justify-content-start">
                            <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                            </div>
                    </div>
                </div>
            </div>

        </div>

                <div class="row  bg-down-image-border" >
                    <div class="col-12 text-center mt-2" >
                        <label for="">
                            <p class="text-white"><strong>Video Exterior</strong></p>
                        </label><br>
                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                            <source src="{{asset('videos/'.$cotizacion->video_exterior)}}" type='video/mp4'>
                        </video>
                    </div>

                    <div class="col-12 text-center mt-2" >
                        <label for="">
                            <p class="text-white"><strong>Video Interior</strong></p>
                        </label><br>
                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                            <source src="{{asset('videos/'.$cotizacion->video_interior)}}" type='video/mp4'>
                        </video>
                    </div>

                    <div class="col-12 text-center mt-5" >
                        <label for="">
                            <p class="text-white"><strong>Video Motor</strong></p>
                        </label><br>
                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                            <source src="{{asset('videos/'.$cotizacion->video_motor)}}" type='video/mp4'>
                        </video>
                    </div>

                   <div class="col-12 text-center mt-5 mb-5" >
                        <label for="">
                            <p class="text-white"><strong>Video Cajuela</strong></p>
                        </label><br>
                        <video controls preload="auto" width="300" height="200" data-setup="{}" style="padding: 10px;">
                            <source src="{{asset('videos/'.$cotizacion->video_cajuela)}}" type='video/mp4'>
                        </video>
                    </div>
                </div>
@endsection
