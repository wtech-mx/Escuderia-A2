@extends('admin.layouts.app')

@section('content')



                <link href="{{ asset('css/garje.css') }}" rel="stylesheet">

                <div class="row bg-image">

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

                                    {{  Form::open(['route' => 'index_admin.user' , 'method' => 'GET' , 'class'=>'form-inline pull-right'] )  }}
                                        <div class="d-flex justify-content-center mt-5">

                                                 <div class="form-group">
                                                     {{ Form::text('name', null,['class' => 'form-control','placeholder' => 'Busqueda por nombre'])  }}
                                                 </div>

                                                <button type="submit" class="btn btn-default">
                                                    <img class="" src="{{ asset('img/icon/white/search.png') }}" width="25px" >
                                                </button>

                                        </div>
                                    {{Form::close()}}

                                    <div class="col-12 mt-4 ">
                                       <div class="d-flex justify-content-center">
                                            {!! $user->links() !!}
                                       </div>
                                    </div>

                                    <div class="content" style="margin-bottom: 10% !important;height: 100vh;">
                                    @foreach ($user as $item)
                                        <div class="col-12 mt-4" >
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
                                                            @if($item->img == NULL)
                                                                <img class="rounded-circle" src="{{ asset('img/icon/black/user.png') }}" height="80px" width="80px" style="width: 80px !important;">
                                                            @else
                                                                <img class="rounded-circle" src="{{ asset('img-perfil/'.$item->img) }}" height="80px" width="80px" style="width: 80px !important;">
                                                            @endif
                                                      </div>
                                                  </div>
                                                </div>
                                        </div>
                                    @endforeach
                                    </div>

{{--                                     {{ $user->render() }}--}}

               </div>




@endsection
