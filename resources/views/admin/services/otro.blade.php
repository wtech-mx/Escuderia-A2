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
                                            <a class="nav-link active" id="pills-Empresa-tab" data-toggle="pill" href="#pills-Empresa" role="tab" aria-controls="pills-Empresa" aria-selected="true">
                                                <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                Empresa
                                            </a>
                                          </li>

                                          <li class="nav-item bg-white">
                                            <a class="nav-link text-dark" id="pills-Usuario-otro-tab" data-toggle="pill" href="#pills-Usuario-otro" role="tab" aria-controls="pills-Usuario-otro" aria-selected="false">
                                                <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                Usuario
                                            </a>
                                          </li>
                                        </ul>
                                     </div>
                                     <div class="tab-content p-4" id="pills-tabContent">

                                      <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa" role="tabpanel" aria-labelledby="pills-Empresa-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Empresa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                                <select class="form-control" id="id_empresaot" name="id_empresaot" value="{{ old('id_empresaot') }}">
                                                     <option value="">Seleccione empresa</option>
                                                     @foreach($empresa as $item)
                                                        <option value="{{$item->id}}">{{ ucfirst($item->nombre)}}</option>
                                                     @endforeach
                                                </select>
                                        </div>

                                         <label for="">
                                             <p class="text-white"><strong>Vehiculo</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/coche (7).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <select class="form-control" id="current_autoot2" name="current_autoot2" value="{{ old('current_autoot2') }}">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario-otro" role="tabpanel" aria-labelledby="pills-Usuario-otro-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control formselect" id="id_userot" name="id_userot" value="{{ old('id_userot') }}">
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

                                            <select class="form-control formselect" id="current_autoot" name="current_autoot" value="{{ old('current_autoot') }}">
                                                    <option value="">Seleccione auto</option>
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                           <div class="col-12 p-4">
                                  <div class="row">
                                      <div class="col-9">

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

                                         <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="8">

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Vida de llantas en KM</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="vida llantas" style="border-radius: 0  10px 10px 0;" id="vida_llantas" name="vida_llantas" value="{{ old('vida_llantas') }}">
                                            </div>

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Km actual del vech&iacute;culo</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="km actual" style="border-radius: 0  10px 10px 0;" id="km_actual" name="km_actual" value="{{ old('km_actual') }}">
                                            </div>

                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Km Estimado</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="km actual" style="border-radius: 0  10px 10px 0;" id="km_estimado" name="km_estimado" value="{{ old('km_actual') }}">
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

                                        <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">

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
                                            Guardar
                                        </button>
                                  </div>

                                  <!-- Select anidado User-->
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_userot').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_user no esta en la tabla de automovil
                                                    $('#current_autoot').empty();
                                                    $('#current_autoot').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_user
                                                    $('#current_autoot').empty();
                                                    $('#current_autoot').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoot').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                     </script>
                                  <!-- Select anidado Empresa-->
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_empresaot').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_empresaot no esta en la tabla de automovil
                                                    $('#current_autoot2').empty();
                                                    $('#current_autoot2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresaot
                                                    $('#current_autoot2').empty();
                                                    $('#current_autoot2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoot2').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                     </script>
                       </form>
