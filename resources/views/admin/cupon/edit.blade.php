@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-profile" style="z-index: 100000">
        @if (Session::has('success'))
            <script>
                Swal.fire({
                    title: 'Exito!!',
                    html: 'Se ha editado el <b>Cupon</b>, ' +
                        'Exitosamente',
                    // text: 'Se ha agragado la "MARCA" Exitosamente',
                    imageUrl: '{{ asset('img/icon/color/cupon.png') }}',
                    background: '#fff',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Cupon IMG',
                })

            </script>
        @endif

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.cupon') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong> Editar Cupon </strong>
            </h5>
        </div>

        <div class="col-2">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>
    </div>

    <div class="row  bg-down-image-border" >
        <div class="col-12">
<div class="text-center text-white mt-5 mb-5">
 <h2>Cupon</h2>
</div>

            <form method="POST" action="{{ route('update_admin.cupon', $cupons->id) }}" enctype="multipart/form-data"
                role="form">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="text-white ">
                    @foreach ($cupon as $item)
                    <label for="">
                        <p class="text-white"><strong>Titulo</strong></p>
                    </label>

                   <div class="input-group form-group mb-5">
                       <div class="input-group-prepend">
                           <span class="input-group-text">
                               <i class="fas fa-signature icon-tc"></i>
                           </span>
                       </div>

                       <input type="text" class="form-control" name="titulo" id="titulo" value="{{$item->titulo}}">
                   </div>

                   <label for="">
                        <p class="text-white"><strong>Texto de Validez</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-signature icon-tc"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" name="validez" id="validez" value="{{$item->validez}}">
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Texto Aplación</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-signature icon-tc"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" name="aplicacion" id="aplicacion" value="{{$item->aplicacion}}">
                    </div>

                    <label for="">
                        <p class="text-white"><strong>Precio</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-signature icon-tc"></i>
                            </span>
                        </div>

                        <input type="number" class="form-control" name="precio" id="precio"value="{{$item->precio}}">
                    </div>
                    <input type="hidden" id="qr" name="qr" value="{{$item->qr}}">
                    @endforeach
                </div>

                {{-- <label for="">
                    <p class="text-white"><strong>Fecha de limite</strong></p>
                </label>

                <div class="input-group form-group mb-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                                <i class="far fa-calendar-alt icon-tc"></i>
                        </span>
                    </div>
                        <input type="date" class="form-control" name="end" id="end" value="{{$cupons->end}}">
                </div> --}}


                {{-- <input type="hidden" id="id_cupon" name="id_cupon" value="{{$cupons->id_cupon}}">
                <input type="hidden" id="descripcion" name="descripcion" value="{{$cupons->descripcion}}">
                <input type="hidden" id="enviado" name="enviado" value="{{$cupons->enviado}}">


                <select class="form-control" id="id_user" name="id_user">
                    @foreach ($cupon_user as $item)
                      <option value="{{$item->id_user}}">{{ $item->User->name }}</option>
                    @endforeach
                </select>

                @if ($cupons->check == 1)
                <input class="form-check-input" type="checkbox" value="1" id="check" name="check" checked>
                @else
                <input class="form-check-input" type="checkbox" id="check" name="check" value="0">
                @endif --}}

                    <div class="col-12 mt-5">
                        <button class="btn btn-lg btn-success btn-save-neon text-white"
                            style="margin-bottom: 15rem !important;">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>

            </form>
        </div>
    </div>
@endsection


