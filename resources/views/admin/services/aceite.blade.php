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
                                            <a class="nav-link active" id="pills-Empresa-aceite-tab" data-toggle="pill" href="#pills-Empresa-aceite" role="tab" aria-controls="pills-Empresa-aceite" aria-selected="true">
                                                <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                Empresa
                                            </a>
                                          </li>

                                          <li class="nav-item bg-white">
                                            <a class="nav-link text-dark" id="pills-Usuario-aceite-tab" data-toggle="pill" href="#pills-Usuario-aceite" role="tab" aria-controls="pills-Usuario-aceite" aria-selected="false">
                                                <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                Usuario
                                            </a>
                                          </li>
                                        </ul>
                                      </div>


                                    <div class="tab-content" id="pills-tabContent">

                                      <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa-aceite" role="tabpanel" aria-labelledby="pills-Empresa-aceite-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Empresa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                                <select class="form-control" id="id_empresaac" name="id_empresaac">
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

                                            <select class="form-control" id="current_autoac" name="current_autoac">
                                              <option value="">seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario-aceite" role="tabpanel" aria-labelledby="pills-Usuario-aceite-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control" id="id_userac" name="id_userac" value="{{ old('id_userac') }}">
                                                     <option value="">Seleccione usuario</option>
                                                     @foreach($user as $item)
                                                        <option value="{{$item->id}}">{{ ucfirst($item->name)}}</option>
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

                                            <select class="form-control" id="current_autoac2" name="current_autoac2">
                                              <option value="">seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                    </div>


                                    {{--/*|----------------------------------------------------------------------------}}
                                    {{--Tab Empres o User--}}
                                    {{--|--------------------------------------------------------------------------*/--}}

                                  </div>


                                  <div class="col-9 p-4">

                                         <label for="">
                                             <p class="text-white"><strong>Marca</strong></p>
                                         </label>

                                            <div class="input-group form-group ">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                    </span>
                                                </div>

                                             <select class="form-control input-edit-car" id="id_marca" name="id_marca" value="{{ old('id_marca') }}">
                                                <option>Selecciona la marca</option>
                                                @foreach($marca as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                             </select>
                                            </div>
                                        </div>

                                  <div class="col-3 p-4">
                                         <label for="">
                                             <p class="text-white"><strong>-</strong></p>
                                         </label>
                                             <!-- Button trigger modal -->
                                            <a  class="btn bg-white" data-toggle="modal" data-target="#Marca">
                                                <img class="" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="25px" >
                                            </a>

                                        </div>

                                  <div class="col-12 p-4">
                                         <label for="">
                                             <p class="text-white"><strong>Descripción y/o información adicional</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/contrato.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="descripcion" style="border-radius: 0  10px 10px 0;" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                                            </div>
                                                <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="4">
                                         <label for="">
                                             <p class="text-white"><strong>Garantia</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/garantia.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="garantia" style="border-radius: 0  10px 10px 0;" id="garantia" name="garantia" value="{{ old('garantia') }}">
                                            </div>

                                         <label for="">
                                             <p class="text-white"><strong>Vida de llantas en KM</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Vida de llantas" style="border-radius: 0  10px 10px 0;" id="vida_llantas" name="vida_llantas" value="{{ old('vida_llantas') }}">
                                            </div>

                                         <label for="">
                                             <p class="text-white"><strong>Km actual del vechiculo</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro (2).png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Km actual" style="border-radius: 0  10px 10px 0;" id="km_actual" name="km_actual" value="{{ old('km_actual') }}">
                                            </div>

                                         <label for="">
                                             <p class="text-white"><strong>Video Interior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input " id="video" name="video">
                                          <label class="custom-file-label " for="customFile">Selecciona Video</label>
                                        </div>

                                         <label for="" class="mt-3">
                                             <p class="text-white"><strong>Video Exterior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="video" name="video">
                                          <label class="custom-file-label" for="customFile">Selecciona Video</label>
                                        </div>



                                          <button class="btn btn-lg btn-success btn-save mt-4">
                                              <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                              Actualizar
                                         </button>


                                  </div>
                                  <!-- Select anidado User-->
                                    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_userac').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_userac no esta en la tabla de automovil
                                                    $('#current_autoac2').empty();
                                                    $('#current_autoac2').append(`<option value="" disabled selected>Prosesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_userac
                                                    $('#current_autoac2').empty();
                                                    $('#current_autoac2').append(`<option value="" disabled selected>Seleccione Automovil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoac2').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                  <!-- Select anidado Empresa-->
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_empresaac').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_empresaac no esta en la tabla de automovil
                                                    $('#current_autoac').empty();
                                                    $('#current_autoac').append(`<option value="" disabled selected>Prosesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresaac
                                                    $('#current_autoac').empty();
                                                    $('#current_autoac').append(`<option value="" disabled selected>Seleccione Automovil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoac').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                      </form>
