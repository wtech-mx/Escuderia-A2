@extends('admin.layouts.app')

@section('content')

@section('crop-css')
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ijaboCropTool.min.css') }}">
@endsection

<link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">
<div class="row bg-down-blue " style="border-radius: 0 0 0 0; height: 95vh;">

                        @if(Session::has('success'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado la <b>Póliza de Seguro </b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/obediente.png') }}',
                              background: '#fff',
                              imageWidth: 150,
                              imageHeight: 150,
                              imageAlt: 'obediente IMG',
                            })
                        </script>
                        @endif

                        @if(Session::has('destroy'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha eliminado su <b>Póliza de Seguro</b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/delete.png') }}',
                              background: '#fff',
                              imageWidth: 150,
                              imageHeight: 150,
                              imageAlt: 'Facturas IMG',
                            })
                        </script>
                        @endif

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index_admin.view-exp-fisico-admin') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Póliza de Seguro</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <strong class="text-center" style="color: rgb(102, 223, 66)"> {{ $automovil->placas }}</strong>

                        <div class="col-12 mt-3 mb-5">
                            <div class="d-flex justify-content-between">
                            <p class="text-center text-white">
                                Agregar m&aacute;s
                            </p>

                                <!-- Button trigger modal -->
                                <button  class="btn " data-toggle="modal" data-target="#exampleModal">
                                 <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </button>

                            </div>
                        </div>

                    @if ($exp_poliza->count())
                        @foreach($exp_poliza as $item)
                            @php
                                $texto= substr($item->poliza, -3);
                            @endphp
                            <div class="col-6 text-center">
                                <a  class="" data-toggle="modal" data-target="#modal-doc-{{$item->id}}">
                                        @if($texto == 'pdf')
                                                <iframe width="140" height="140" src="{{asset('exp-poliza/'.$item->poliza)}}" frameborder="0"></iframe>
                                                <p class="text-center text-white">{{$item->titulo}}</p>
                                        @else
                                            <img class="img-fluid d-inline mb-2" src="{{asset('exp-poliza/'.$item->poliza)}}" alt="{{$item->poliza}}" width="100px">
                                            <p class="text-center text-white">{{$item->titulo}}</p>
                                        @endif
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
                              <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">

                                  <div class="modal-body position-relative">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                          <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{asset('exp-poliza/'.$item->poliza)}}" alt="First slide">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="botones-hijo position-absolute" style="z-index: 1000; top: 40%; right: 10px; padding: 5px">
                                            <div class="d-flex flex-column">

                                                  <div class="p-1">
                                                       <a  class="btn btn-danger text-white mt-5" data-toggle="modal" data-target="#modalpoliza{{$item->id}}">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                       </a>
                                                  </div>

                                                  <div class="p-1">
                                                      <a  class="btn btn-secondary" data-dismiss="modal">
                                                            <i class="fa fa-window-close" aria-hidden="true"></i>
                                                      </a>
                                                  </div>

                                            </div>
                                        </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                            @include('exp-fisico.eliminar')
                        @endforeach
                    @else

                        <div class="col-12 mb3">
                            <p class="text-center title-car">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/paper (1).png') }}" alt="Icon documento" width="150px">

                            </p>
                            <p class="text-center  text-white">
                             <strong style="font: normal normal bold 20px/20px Segoe UI;">A&uacute;n no tienes Expedientes! </strong><br>
                             Escanea tus documentos has <br> click en el botón de + para <br> agregar tu expediente
                            </p>
                        </div>

                        <div class="col-12 mt-5">
                            <p class="text-center">
                                 <button  class="btn " data-toggle="modal" data-target="#exampleModal">
                                    <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="60px">
                                </button>
                            </p>
                        </div>


                        <div class="col-12 mt-3">
                            <p class="text-center text-white">
                                Escanea tu Expediente
                            </p>
                        </div>

                    @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        Agregar Imagen
                                    </p>
                                  </div>

                               <form method="POST" action="{{route('store_admin.view-poliza-admin', $automovil->id)}}" enctype="multipart/form-data" role="form">
                                         @csrf

                                    <div class="col-12">
                                         <label for="">
                                             <p class="text-white"><strong>Titulo</strong></p>
                                         </label>

                                         <div class="input-group form-group">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text input-modal" >
                                                       <img class="" src="{{ asset('img/icon/white/fuente.png') }}" width="25px" >
                                                  </span>
                                              </div>
                                                  <input type="text" class="form-control" placeholder="Titulo" id="titulo" name="titulo" style="border-radius: 0  10px 10px 0;">
                                         </div>
                                    </div>

                                <div class="col-12 mt-3">
                                          <div class=" custom-file mb-3">
                                            <input type="file" class="custom-file-input input-group-text image" id="poliza" name="poliza">
                                            <label class="custom-file-label">Elegir img...</label>
                                          </div>

                                    <p class="text-center">
                                        Agregar <br>
                                        Poliza de Seguro

                                        <br>

                                                <button type="submit" class="btn btn-success btn-save text-white">
                                                    <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                                    Guardar
                                                </button>
                                    </p>



                                </div>
                               </form>
                              </div>


                            </div>
                          </div>
                        </div>

</div>

@section('crop-js')
<script src="{{ asset('js/ijaboCropTool.min.js') }}"></script>
<script>
    $('#poliza').ijaboCropTool({

        fileName:'file_name',
        preview: '.image-previewer',
        setRatio: 4/8,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['Cortar', 'Cerrar'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],
        processUrl: '{{ route('store_admin.view-bp-admin', $automovil->id) }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],

        onSuccess: function(message, element, status) {
            window.location.reload();

        },
        onError: function(message, element, status) {
            alert(message);
        }
    });

</script>
@endsection

@endsection
