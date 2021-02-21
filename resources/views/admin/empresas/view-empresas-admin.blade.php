@extends('layouts.app')

@section('content')

@include('admin.empresas.add-empresa-modal')

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
                                <a  class="btn btn-circel" data-toggle="modal" data-target="#empresa">
                                    <h5 class="text-white text-tittle-app mt-2 " style="font: normal normal bold 15px/20px Segoe UI">
                                        Agregar
                                    </h5>
                                </a>

                                 <a  class="btn btn-circel" data-toggle="modal" data-target="#empresa">
                                    <img class="" src="{{ asset('img/icon/white/plus.png') }}" width="30px" >
                                </a>
                            </div>
                        </div>

                                  <div class="row ml-2 mr-2">

                                    @foreach ($empresa as $item)
                                        <div class="col-12 mt-4">
                                            <div class="card card-slide-garaje" >
                                              <div class="card-body p-2" >

                                                  <div class="row">
                                                      <div class="col-6 mt-3">
                                                          <a class="card-text"><strong style="font: normal normal bold 20px/27px Segoe UI;">{{$item->nombre}}</strong></a>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->telefono}}</strong></p>
                                                          <p class="card-text" style="font-size: 12px"><strong>{{$item->email}}</strong></p>
                                                      </div>

                                                      <div class="col-6">
                                                        <img class="d-inline mb-2" src="{{ asset('img/icon/car.png') }}" alt="Icon documento" width="150px">
                                                      </div>
                                                  </div>

                                              </div>
                                            </div>
                                        </div>
                                    @endforeach

                                  </div>
                </div>



@endsection
