                              <form method="POST" action="{{route('store_servicio.servicio')}}" enctype="multipart/form-data" role="form">
                                 @csrf
                                  <div class="col-12">

                                      <p class="title-services text-center p-3">
                                          Elige al usuario o empresa <br> del auto a elegir
                                      </p>

                                    {{--/*|----------------------------------------------------------------------------}}
                                    {{--Tab Empres o User--}}
                                    {{--|--------------------------------------------------------------------------*/--}}

                                     <div class="d-flex justify-content-center">.
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                          <li class="nav-item bg-white">
                                            <a class="nav-link active" id="pills-Empresa-amortiguadores-tab" data-toggle="pill" href="#pills-Empresa-amortiguadores" role="tab" aria-controls="pills-Empresa-amortiguadores" aria-selected="true">
                                                <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                Empresa
                                            </a>
                                          </li>

                                          <li class="nav-item bg-white">
                                            <a class="nav-link text-dark" id="pills-Usuario-amortiguadores-tab" data-toggle="pill" href="#pills-Usuario-amortiguadores" role="tab" aria-controls="pills-Usuario-amortiguadores" aria-selected="false">
                                                <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                Usuario
                                            </a>
                                          </li>
                                        </ul>
                                      </div>


                                    <div class="tab-content p-4" id="pills-tabContent">

                                      <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa-amortiguadores" role="tabpanel" aria-labelledby="pills-Empresa-amortiguadores-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Empresa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control" id="id_empresaam" name="id_empresaam">
                                                     <option value="">Seleccione empresa</option>
                                                     @foreach($empresa as $item)
                                                        <option value="{{$item->id}}">{{ ucfirst($item->nombre)}}</option>
                                                     @endforeach
                                                </select>
                                        </div>

                                         <label for="">
                                             <p class="text-white"><strong>Veh&iacute;culo</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <select class="form-control" id="current_autoam" name="current_autoam">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario-amortiguadores" role="tabpanel" aria-labelledby="pills-Usuario-amortiguadores-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control" id="id_useram" name="id_useram" value="{{ old('id_useram') }}">
                                                     <option value="">Seleccione usuario</option>
                                                     @foreach($user as $item)
                                                        <option value="{{$item->id}}">{{ ucfirst($item->name)}}</option>
                                                     @endforeach
                                                 </select>
                                        </div>

                                         <label for="">
                                             <p class="text-white"><strong>Veh&iacute;culo</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <select class="form-control" id="current_autoam2" name="current_autoam2" value="{{ old('current_autoam') }}">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                    </div>


                                    {{--/*|----------------------------------------------------------------------------}}
                                    {{--Tab Empres o User--}}
                                    {{--|--------------------------------------------------------------------------*/--}}

                                  </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Amortiguador delantero?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="amortig_delanteras" id="amortig_delanteras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                    Si
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="amortig_delanteras" id="amortig_delanteras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  No
                                              </label>
                                            </div>

                                  </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Amortiguador Trasero?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="amortig_traseras" id="amortig_traseras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                    Si
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="amortig_traseras" id="amortig_traseras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  No
                                              </label>
                                            </div>
                                  </div>


                                  <div class="col-12 p-4">

                                         <div class="row">
                                            <div class="col-9">
                                             <label for="">
                                                 <p class="text-white"><strong>Seleccione proveedor 1</strong></p>
                                             </label>

                                             <select class="form-control input-edit-car" id="id_proveedor" name="id_proveedor" value="{{ old('id_proveedor') }}">
                                                     <option value="">Seleccione proveedor 1</option>
                                                        @foreach($proveedor as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                        @endforeach
                                             </select>
                                            </div>

                                            <div class="col-3">
                                                 <label for="">
                                                     <p class="text-white"><strong>Proveedores</strong></p>
                                                 </label>
                                                <div class="input-group form-group ">
                                                 <!-- Button trigger modal -->
                                                <a  class="btn bg-white" data-toggle="modal" data-target="#proveedores" style="border-radius:10px">
                                                    <img class="" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="25px" >
                                                </a>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="row mb-5">
                                            <div class="col-9">
                                             <label for="">
                                                 <p class="text-white"><strong>Proveedor 2</strong></p>
                                             </label>

                                             <select class="form-control input-edit-car" id="id_proveedor2" name="id_proveedor2" value="{{ old('id_proveedor2') }}">
                                                     <option value="">Seleccione proveedor 2</option>
                                                        @foreach($proveedor as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                        @endforeach
                                             </select>
                                            </div>
                                             <div class="col-3"></div>

                                            <div class="col-9">
                                             <label for="">
                                                 <p class="text-white"><strong>Proveedor 3</strong></p>
                                             </label>

                                             <select class="form-control input-edit-car" id="id_proveedor3" name="id_proveedor3" value="{{ old('id_proveedor3') }}">
                                                     <option value="">Seleccione proveedor 3</option>
                                                        @foreach($proveedor as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                        @endforeach
                                             </select>
                                            </div>
                                             <div class="col-3"></div>
                                         </div>

                                        <div class="row">
                                            <div class="col-12">

                                             <label for="">
                                                 <p class="text-white"><strong>Descripci&oacute;n y/o informaci&oacute;n adicional</strong></p>
                                             </label>

                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend " >
                                                        <span class="input-group-text input-services" >
                                                             <img class="" src="{{ asset('img/icon/white/contrato.png') }}" width="25px" >
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Descripcion" style="border-radius: 0  10px 10px 0;" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                                                </div>
                                            </div>

                                        </div>

                                         <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="6">

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Vida de amortiguador en KM</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="amortiguador en KM" style="border-radius: 0  10px 10px 0;" id="vida_llantas" name="vida_llantas" value="{{ old('vida_llantas') }}">
                                            </div>
                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Km actual del veh&iacute;culo</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Km actual" style="border-radius: 0  10px 10px 0;" id="km_actual" name="km_actual" value="{{ old('km_actual') }}">
                                            </div>
                                         <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">

                                         <hr>

                                         <label for="">
                                             <p class="text-white"><strong>Precio Venta</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Precio Venta" style="border-radius: 0  10px 10px 0;" id="precio" name="precio" value="{{ old('precio') }}" required>
                                            </div>

                                         <hr>

                                         <label for="">
                                             <p class="text-white"><strong>km estimado del próximo servicio</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="km estimado del próximo servicio" style="border-radius: 0  10px 10px 0;" id="km_estimado" name="km_estimado" value="{{ old('km_actual') }}">
                                            </div>

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Fecha Próxima</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-services">
                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>
                                             <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='start' name="start">
                                        </div>

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>V&iacute;deo Interior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input " id="video" name="video">
                                          <label class="custom-file-label " for="customFile">Selecciona V&iacute;deo</label>
                                        </div>

                                         <hr>
                                         <label for="" class="mt-3">
                                             <p class="text-white"><strong>V&iacute;deo Exterior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="video2" name="video2">
                                          <label class="custom-file-label" for="customFile">Selecciona V&iacute;deo</label>
                                        </div>

                                        <button class="btn btn-lg btn-success btn-save-neon text-white mt-4" style="margin-bottom: 8rem !important;">
                                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                            Actualizar
                                        </button>

                                  </div>
                                    <!-- Select anidado User-->
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_useram').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_useram no esta en la tabla de automovil
                                                    $('#current_autoam2').empty();
                                                    $('#current_autoam2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relamionados con el id_useram
                                                    $('#current_autoam2').empty();
                                                    $('#current_autoam2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoam2').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <!-- Select anidado Empresa-->
                                    <script>
                                        $(document).ready(function () {
                                                    $('#id_empresaam').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_empresaam no esta en la tabla de automovil
                                                    $('#current_autoam').empty();
                                                    $('#current_autoam').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresaac
                                                    $('#current_autoam').empty();
                                                    $('#current_autoam').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoam').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                              </form>
