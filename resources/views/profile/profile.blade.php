@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

                <div class="row bg-profile" style="z-index: 100000">

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                  <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Datos de perfil</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-12 p-3">
                        <p class="text-center">
                            <img class="rounded-circle" src="https://www.elsiglodetorreon.com.mx/m/i/2021/01/1384186.jpeg" height="150px" width="150px">
                            <h4 class="text-center text-white">
                                <strong>Nombre User</strong>
                            </h4>
                        </p>
                    </div>

                </div>

                <div class="row bg-down-blue-border" style="background: #050F55 0% 0% no-repeat padding-box;">
                    <div class="col-12 mt-5">

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                          <li class="nav-item mr-2">
                            <a class="nav-link active" id="pills-perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true">
                                Datos de perfil
                            </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" id="pills-Seguridad-tab" data-toggle="pill" href="#pills-Seguridad" role="tab" aria-controls="pills-Seguridad" aria-selected="false">
                                Seguridad
                            </a>
                          </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                          <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">

                             <label for="">
                                 <p class="text-white"><strong>Correo</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/email.png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Telefono</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/call.png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de nacimiento</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" type="date" src="{{ asset('img/icon/white/calendario (2).png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Direccion</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" src="{{ asset('img/icon/white/marcador-de-posicion.png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Referencia</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px" >
                                    </span>
                                </div>

                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Ale</option>
                                </select>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Genero</strong></p>
                             </label>

                          <div class="col-12 text-center">

                            <div class="input-group form-group d-inline">

                                <div class="d-flex justify-content-between">

                                    <div class="form-check form-check-inline d-block">
                                        <div class="d-flex justify-content-center">
                                            <input class="form-check-input d-block" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        </div>

                                        <label class="form-check-label text-white" for="inlineRadio1">
                                            Masculino
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline d-block">
                                        <div class="d-flex justify-content-center">
                                            <input class="form-check-input  d-block" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        </div>
                                      <label class="form-check-label text-white" for="inlineRadio2">
                                          Femenino
                                      </label>
                                    </div>

                                    <div class="form-check form-check-inline d-block">
                                        <div class="d-flex justify-content-center">
                                            <input class="form-check-input d-block" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        </div>
                                      <label class="form-check-label text-white" for="inlineRadio3">
                                          Otro
                                      </label>
                                    </div>

                                </div>

                            </div>

                          </div>

                              <div class="col-12 text-center mt-3 mb-5">

                                  <button class="btn btn-lg btn-success btn-save ">
                                      <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                      Actualizar
                                 </button>

                              </div>

                          </div>

                          <div class="tab-pane fade" id="pills-Seguridad" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                             <label for="">
                                 <p class="text-white"><strong>Contraseña</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/padlock.png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/password.png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                            </div>

                              <div class="col-12 text-center mt-5 mb-5">

                                  <button class="btn btn-lg btn-success btn-save ">
                                      <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                      Actualizar
                                  </button>

                              </div>

                          </div>

                        </div>

                    </div>
                </div>


@endsection
