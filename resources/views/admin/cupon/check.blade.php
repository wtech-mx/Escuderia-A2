@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/cupones.css') }}" rel="stylesheet">
@endsection

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
    <div class="row  bg-image">
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


        <div class="content container-res-max">

            <div class="col-12">

                <div class="d-flex justify-content-center align-items-center container p-5">
                      <div class="d-flex card text-center" style="background: {{$cupons->color}}">

                          <div class="content-cupon p-3 bg-white" style="border-radius: 20px">
                              <img class="" src="{{ asset('qr/'.$cupons->qr) }}" alt="{{ asset('img/qr/'.$cupons->qr) }}" width="85">
                          </div>

                          <h1 class="mt-3">
                              <strong>  {{$cupons->precio}} </strong>
                          </h1>

                          <h2 class="mt-3">
                              <strong>  {{$cupons->titulo}} </strong>
                          </h2>

                          <div class="mt-4">
                              <h3>5 Dias Restantes</h3>
                          </div>

                          <div class="mt-4">
                              <small> Terminos y/o condiciones : <br> <strong> {{$cupons->aplicacion}} </strong></small>
                          </div>

                          <div class="mt-4">
                              @if($cupons->estado == 1)
                                  <button type="button" class="btn btn-outline-success text-white">
                                      ACTIVADO
                                  </button>
                              @else
                                  <button type="button" class="btn btn-outline-danger text-white">
                                      DESACTIVADO
                                  </button>
                              @endif
                          </div>

                      </div>
                </div>

                <form class="p-5" method="POST" action="{{ route('update_check.cupon', $cupons->id) }}" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

                        <select class="form-control js-example-basic-single " id="id_user" name="id_user">
                            @foreach ($cupons_user as $item)
                                <option value="{{ $item->id }}">{{ $item->User->name }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-lg btn-success btn-save-neon text-white mt-5">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>

                </form>

            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

@endsection
