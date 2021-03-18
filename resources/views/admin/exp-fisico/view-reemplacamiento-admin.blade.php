@extends('admin.layouts.app')

@section('content')


<div class="row bg-down-blue" style="border-radius: 0 0 0 0;">

                        @if(Session::has('success'))
                        <script>
                            Swal.fire({
                              title: 'Exito!!',
                              html:
                                'Se ha agragado la <b>BAJA DE PLACAS</b>, ' +
                                'Exitosamente',
                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                              imageUrl: '{{ asset('img/icon/color/matricula.png') }}',
                              background: '#fff',
                              imageWidth: 150,
                              imageHeight: 150,
                              imageAlt: 'matricula IMG',
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
                                        <strong>Reemplacamiento</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3 mb-5">
                            <div class="d-flex justify-content-between">
                            <p class="text-center text-white">
                                Agregar mas
                            </p>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                                 <img class="d-inline mb-2" src="{{ asset('img/icon/white/plus.png') }}" alt="Icon documento" width="30px">
                                </button>

                            </div>
                        </div>

                    @if ($exp_reemplacamiento->count())
                        @foreach($exp_reemplacamiento as $item)
                            <div class="col-6">
                                <a type="button" class="" data-toggle="modal" data-target="#modal-doc-{{$item->id}}">
                                    <p class="text-center">
                                            <img class="d-inline mb-2" src="{{asset('exp-reemplacamiento/'.$item->reemplacamiento)}}" alt="{{$item->reemplacamiento}}" width="100px">
                                    </p>
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
                              <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="d-flex justify-content-end">
                                      <div class="mr-4 mt-3">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                      </div>
                                    </div>

                                  <div class="modal-body">
                                      <p class="text-center">
                                          <img class="" src="{{asset('exp-reemplacamiento/'.$item->reemplacamiento)}}" alt="{{$item->reemplacamiento}}" width="100%">
                                      </p>
                                  </div>

                                </div>
                              </div>
                            </div>
                        @endforeach
                    @else

                        <div class="col-12 mb3">
                            <p class="text-center title-car">
                            <img class="d-inline mb-2" src="{{ asset('img/icon/white/paper (1).png') }}" alt="Icon documento" width="150px">

                            </p>
                            <p class="text-center  text-white">
                             <strong style="font: normal normal bold 20px/20px Segoe UI;">Aun no tienes Expedientes! </strong><br>
                             Escanea tus documentos has <br> click en el botón de + para <br> agregar tu expediente
                            </p>
                        </div>

                        <div class="col-12 mt-5">
                            <p class="text-center">
                                 <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
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

                               <form method="POST" action="{{route('store_admin.view-reemplacamiento-admin', $automovil->id)}}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="col-12 mt-3">
                                    <div class=" custom-file mb-3">
                                        <input type="file" class="custom-file-input input-group-text" name="reemplacamiento">
                                        <label class="custom-file-label">Elegir img...</label>
                                    </div>

                                    <p class="text-center">
                                        Agregar <br>
                                        Reemplacamiento
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

@endsection
