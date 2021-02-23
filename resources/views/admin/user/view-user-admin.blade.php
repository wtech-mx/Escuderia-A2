@extends('layouts.app')

@section('content')



                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row" style="background: #050F55 0% 0% no-repeat padding-box;">


                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Usuarios</strong>
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

                                <a  class="btn btn-circel" href="{{ route('create_admin.user') }}">
                                    <h5 class="text-white text-tittle-app mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                        Agregar
                                    </h5>
                                </a>

                                 <a  class="btn btn-circel" href="{{ route('create_admin.user') }}">
                                    <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                                </a>

                            </div>
                        </div>

                                @if(Session::has('success'))
                                    <script>
                                        Swal.fire(
                                            'Exito!',
                                            'Se ha guardado exitosamiente.',
                                            'success'
                                        )
                                    </script>
                                @endif

                                    @foreach ($user as $item)
                                        <div class="col-12 mt-4">

                                                <div class="card card-slide-garaje" >
                                                  <div class="card-body p-2" >

                                                      <div class="row">

                                                          <div class="col-6 mt-3">
                                                              <a class="card-text" href="{{ route('edit_admin.user',$item->id) }}">
                                                                  <strong style="font: normal normal bold 20px/27px Segoe UI;">
                                                                      {{$item->name}}
                                                                  </strong>
                                                              </a>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->telefono}}</strong></p>
                                                              <p class="card-text" style="font-size: 12px"><strong>{{$item->email}}</strong></p>
                                                          </div>

                                                          <div class="col-6">
                                                              <img class="d-inline" src="{{ asset('img-perfil/'.$item->img) }}" alt="Icon documento" width="110px">
                                                          </div>

                                                      </div>

                                                  </div>
                                                </div>

                                        </div>
                                    @endforeach

                                  </div>
                </div>



@endsection
