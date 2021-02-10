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
                                            <a class="nav-link active" id="pills-Empresa-bateria-tab" data-toggle="pill" href="#pills-Empresa-bateria" role="tab" aria-controls="pills-Empresa-bateria" aria-selected="true">
                                                <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                Empresa
                                            </a>
                                          </li>

                                          <li class="nav-item bg-white">
                                            <a class="nav-link text-dark" id="pills-Usuario-bateria-tab" data-toggle="pill" href="#pills-Usuario-bateria" role="tab" aria-controls="pills-Usuario-bateria" aria-selected="false">
                                                <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                Usuario
                                            </a>
                                          </li>
                                        </ul>
                                      </div>


                                    <div class="tab-content" id="pills-tabContent">

                                      <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa-bateria" role="tabpanel" aria-labelledby="pills-Empresa-bateria-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Empresa-bateria</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Ale</option>
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

                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Ale</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario-bateria" role="tabpanel" aria-labelledby="pills-Usuario-bateria-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Ale</option>
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

                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Ale</option>
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

                                                <select class="form-control" id="exampleFormControlSelect1">
                                                  <option>Ale</option>
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
                                                <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                                            </div>

                                         <label for="">
                                             <p class="text-white"><strong>Garantia</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/garantia.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="garantia" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
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
                                                <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
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
                                                <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                                            </div>

                                         <label for="">
                                             <p class="text-white"><strong>Video Interior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input " id="customFile">
                                          <label class="custom-file-label " for="customFile">Selecciona Video</label>
                                        </div>

                                         <label for="" class="mt-3">
                                             <p class="text-white"><strong>Video Exterior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Selecciona Video</label>
                                        </div>



                                          <button class="btn btn-lg btn-success btn-save mt-4">
                                              <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                              Actualizar
                                         </button>


                                  </div>
