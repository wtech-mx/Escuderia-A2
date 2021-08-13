@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style=" min-height: 10vh">
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Cotización</strong>
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



                <div class="row  bg-down-image-border" >

                    <div class="col-12  mt-5">

                    <form class="card-details" method="POST" action="{{route('store.cotizacion')}}" enctype="multipart/form-data" role="form">
                        @csrf

                            @if(Session::has('success'))
                                        <script>
                                            Swal.fire({
                                              title: 'Exito!!',
                                              html:
                                                'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                                'Exitosamente',
                                              // text: 'Se ha agragado la "MARCA" Exitosamente',
                                              imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                              background: '#fff',
                                              imageWidth: 150,
                                              imageHeight: 150,
                                              imageAlt: 'USUARIO IMG',
                                            })
                                        </script>
                            @endif

                            <div id="accordion">

                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                      <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Información del cliente o Empresa
                                      </a>
                                    </h5>
                                  </div>

                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">

                                        <label for="">
                                            <p ><strong>Cliente Existente</strong></p>
                                        </label>

                                       <div class="input-group form-group mb-3">
                                           <select class="col-12 usuario" id="id_user" name="id_user">
                                                <option value="">Seleccione Cliente</option>
                                               @foreach ($user as $item)
                                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                                               @endforeach
                                           </select>
                                       </div>

                                       <label for="">
                                            <p ><strong>Clinete no registrado</strong></p>
                                        </label>

                                        <div class="input-group form-group mb-5">
                                            <input type="text" class="form-control" placeholder="Nombre Cliente Externo" id="user" name="user">
                                        </div>


                                       <label for="">
                                            <p ><strong>Empresa</strong></p>
                                        </label>

                                        <div class="input-group form-group mb-3">
                                            <select class="form-control" id="id_empresa" name="id_empresa">
                                                    <option value="">Seleccione Empresa Interno</option>
                                                @foreach ($empresa as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="">
                                            <p ><strong>Empresa no registrada</strong></p>
                                        </label>

                                        <div class="input-group form-group mb-5">
                                            <input type="text" class="form-control" placeholder="Nombre Empresa Externa" id="empresa" name="empresa">
                                        </div>

                                        <label for="">
                                            <p ><strong>Telefono</strong></p>
                                        </label>

                                        <div class="input-group form-group mb-5">
                                            <input type="number" class="form-control" placeholder="55 5555 5555" id="telefono" name="telefono">
                                        </div>

                                        <label for="">
                                            <p ><strong>Correo</strong></p>
                                        </label>

                                        <div class="input-group form-group mb-5">
                                            <input type="text" class="form-control" placeholder="correo@correo.com" id="correo" name="correo">
                                        </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                      <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Servicio
                                      </a>
                                    </h5>
                                    <input type="button" class="proveedor3" id="proveedor3" value="Agregar servicio">
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">

                                        <label>Servicio</label>
                                        <div class="input-group form-group mb-4">
                                            <input type="text" class="form-control" name="servicio[]" placeholder="Servicio">
                                        </div>

                                        <label>Pieza o Refacción</label>
                                        <div class="input-group form-group mb-4">
                                            <input type="text" class="form-control" name="pieza[]" placeholder="pieza / Refacción">
                                        </div>

                                        <label>Cantidad</label>
                                        <div class="input-group form-group mb-4">
                                            <input type="number" class="form-control" name="cantidad[]" placeholder="Cantidad">
                                        </div>

                                        <label>Mano de Obra</label>
                                        <div class="input-group form-group mb-4">
                                            <input type="number" class="form-control" name="mano_o[]" placeholder="Mano de Obra">
                                        </div>

                                        <div id="nuevo-form3"></div>

                                        <label>Costo Total</label>
                                        <div class="input-group form-group mb-4">
                                            <input type="number" class="form-control" name="total" placeholder="Costo total">
                                        </div>

                                    </div>
                                  </div>
                                </div>
                              </div>

                            <div class="col-12 text-center mt-2" style="margin-bottom: 8rem !important;">
                                <button class="btn btn-lg btn-save-neon text-white">
                                    <i class="fas fa-save icon-tc"></i>
                                    Actualizar
                                </button>
                            </div>


                            <script>
                                var agregar3 = document.getElementById('proveedor3');
                                var contenedor3 = document.getElementById('nuevo-form3');
                                var contador = 0;

                                agregar3.addEventListener('click', function(){
                                    contador++;
                                    var _form3 = '<hr>'+
                                                '<label>Servicio</label>' +
                                                '<div class="input-group form-group mb-4">' +
                                                '<input type="text" class="form-control" name="servicio[]" placeholder="Servicio"></div>' +
                                                '<label>Pieza o Refacción</label>' +
                                                '<div class="input-group form-group mb-4">' +
                                                '<input type="text" class="form-control" name="pieza[]" placeholder="pieza / Refacción"></div>' +
                                                '<label>Cantidad</label>' +
                                                '<div class="input-group form-group mb-4">' +
                                                '<input type="number" class="form-control" name="cantidad[]" placeholder="Cantidad"></div>' +
                                                '<label>Mano de Obra</label>' +
                                                '<div class="input-group form-group mb-4">' +
                                                '<input type="number" class="form-control" name="mano_o[]" placeholder="Mano de Obra"></div>';

                                    contenedor3.innerHTML += _form3;
                                })
                            </script>

                        </form>
                    </div>
                </div>

    @section('js')
        <script src="{{ asset('js/select2.full.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.usuario').select2();
            });
        </script>

    @endsection

@endsection
