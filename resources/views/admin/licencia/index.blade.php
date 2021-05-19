@extends('admin.layouts.app')

@section('content')

    <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

    <div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8  mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Licencia de Conducir</strong>
            </h5>
        </div>

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>
    </div>


    <div class="row bg-image">
        <div class="col-12 mt-4 text-center">
            <p> {!! $licencia->links() !!}</p>
        </div>
        <div class="content container-res-inter">
            <div class="col-12">
                @foreach ($licencia as $item)
                    <a class="card-text " href="{{ route('edit_admin.licencia', $item->id) }}"
                        style="text-decoration: none;color: #000000">
                        <div class="card card-slide-garaje mt-3 mb-3">
                            <div class="card-body p-2">

                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <p class="card-text" href="{{ route('edit_admin.licencia', $item->id) }}">
                                            <strong
                                                style="font: normal normal bold 20px/27px Segoe UI;">{{ $item->User->name }}</strong>
                                        </p>
                                        <p class="card-text" style="font-size: 12px">
                                            <strong>{{ $item->tipo }}</strong>
                                        </p>
                                        <p class="card-text" style="font-size: 12px">
                                            <strong>{{ $item->expedicion }}</strong>
                                        </p>
                                    </div>
                                    @if ($item->tipo == 'sin licencia')
                                        <div class="col-6">
                                            <img class="d-inline mb-2" src="{{ asset('img/icon/page-not-found.png') }}"
                                                alt="Icon documento" width="150px">
                                        </div>
                                    @else
                                        <div class="col-6">
                                            <img class="d-inline mb-2"
                                                src="{{ asset('img/icon/seguros/' . $item->seguro . '.png') }}"
                                                alt="Icon documento" width="150px">
                                        </div>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
