@extends('admin.layouts.app')

@section('content')


                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-down-blue" style="border-radius: 0 0 0 0;">


                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="{{ route('index.dashboard') }}" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Empresas</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-inline">
                            <div class="d-flex flex-row-reverse">

                                <a class="mt-1 ml-5 text-white " href="/exportar/empresas" >
                                    <i class="fa fa-download icon-effect" aria-hidden="true"></i>
                                </a>

                                <div class="content">
                                    <a  class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                                        <h5 class="text-white text-tittle-app mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                            Agregar
                                        </h5>
                                    </a>

                                     <a  class="btn btn-circel" href="{{ route('create_admin.empresa') }}">
                                        <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                                    </a>
                                </div>
                            </div>
                        </div>
                                            <div class="col-12 mt-4 ">
                                                <div class="d-flex justify-content-center">
                                                    {!! $empresa->links() !!}
                                                </div>
                                            </div>
                                  <div class="row ml-2 mr-2">

                                    @if(Session::has('success'))
                                        <script>
                                            Swal.fire(
                                                'Exito!',
                                                'Se ha guardado exitosamente.',
                                                'success'
                                            )
                                        </script>
                                    @endif
                                    <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                        @foreach ($empresa as $item)
                                            <div class="col-12 mt-4">

                                                <div class="card card-slide-garaje" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">

                                                          <div class="col-6 mt-3">
                                                               <a class="card-text" href="{{ route('edit_admin.empresa',$item->id) }}">
                                                                  <strong style="font: normal normal bold 20px/27px Segoe UI;">
                                                                       {{$item->nombre}}
                                                                  </strong>
                                                              </a>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->telefono}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->email}}</strong></p>
                                                          </div>

                                                          <div class="col-6">
                                                              <img class="d-inline" src="{{ asset('img-empresa/'.$item->img) }}" alt="Icon documento" width="110px">
                                                          </div>

                                                      </div>

                                                  </div>
                                                </div>

                                        </div>
                                        @endforeach
                                    </div>

                                  </div>
                </div>



@endsection
