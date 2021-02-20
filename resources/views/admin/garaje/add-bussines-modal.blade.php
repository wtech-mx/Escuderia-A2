{{-- ----------------------------------------------------------------------------}}
{{-- |Modal Add empresa--}}
{{-- |----------------------------------------------------------------------------}}

<div class="modal fade" id="empresa" tabindex="-1" aria-labelledby="empresaLabel" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-body" style="background: #050F55 0% 0% no-repeat padding-box;border-radius: 30px;">

          <div class="row">
              <div class="col-12">

                <h2 class="text-center text-white mt-3">
                    Auto de empresa
                </h2>

                  <p class="text-center mt-3">
                       <img class="img-thumbnail" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="150px" style="padding: 20px;border-radius: 10px">
                  </p>
              </div>
          </div>

                    <div class="row " >
                        <div class="col-12 mt-5">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                              <li class="nav-item mr-2">
                                <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true" style="background-color: #24F1C3;color: #000;font-weight: bold;border-radius: 5px 10px 10px 5px;clip-path: polygon(0% 0%, 0% 100%, 85% 100%, 100% 50%, 85% 0%);">
                                    Datos de perfil
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link a-perso" id="pills-Seguridad-tab" data-toggle="pill" href="#pills-Seguridad" role="tab" aria-controls="pills-Seguridad" aria-selected="false" style="background-color: #24C4FB;color: #fff;font-weight: bold;border-radius: 5px 10px 10px 5px;clip-path: polygon(0% 0%, 15% 50%,0% 100%, 75% 100%, 100% 50%, 75% 0%);">
                                    Seguridad
                                </a>
                              </li>

                            </ul>
                     <form method="POST" action="{{route('store.empresa')}}" enctype="multipart/form-data" role="form">
                         @csrf
                            <div class="tab-content" id="pills-tabContent">

                              <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
                                 <label for="">
                                     <p class="text-white"><strong>Nombre</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/email.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" style="border-radius: 0  10px 10px 0;">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Correo</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/email.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="correo@correo.com" id="email" name="email" style="border-radius: 0  10px 10px 0;">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Telefono</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/call.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="00 0000-0000" id="telefono" name="telefono" style="border-radius: 0  10px 10px 0;">
                                </div>


                                 <label for="">
                                     <p class="text-white"><strong>Direccion</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/marcador-de-posicion.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id="direccion" name="direccion">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Referencia</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/referencia (1).png') }}" width="25px" >
                                        </span>
                                    </div>

                                                 <select class="form-control" id="referencia" name="referencia">
                                                     <option>Seleccione Referencia</option>
                                                     @foreach($user as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                     @endforeach
                                                 </select>
                                </div>
                              </div>

                              <div class="tab-pane fade" id="pills-Seguridad" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                                 <label for="">
                                     <p class="text-white"><strong>Contraseña</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/padlock.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="****" style="border-radius: 0  10px 10px 0;">
                                </div>

                                 <label for="">
                                     <p class="text-white"><strong>Confirmar Contraseña </strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/password.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="****" id="password" name="password" style="border-radius: 0  10px 10px 0;">
                                </div>

                                  <div class="col-12 text-center mt-5 mb-5">

                                      <button class="btn btn-lg btn-success btn-save mb-5">
                                          <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                          Guardar
                                      </button>

                                  </div>

                              </div>
                            </div>
                     </form>
                        </div>
                    </div>

      </div>

    </div>
  </div>
</div>

{{-- ----------------------------------------------------------------------------}}
{{-- |Modal Add Persona--}}
{{-- |----------------------------------------------------------------------------}}
<div class="modal fade" id="persona" tabindex="-1" aria-labelledby="personaLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

       <div class="modal-body" style="background: #050F55 0% 0% no-repeat padding-box;border-radius: 30px;">
                  <div class="row">
              <div class="col-12">

                <h2 class="text-center text-white mt-3">
                  Auto de persona
                </h2>

                  <p class="text-center mt-3">
                       <img class="img-thumbnail" src="{{ asset('img/icon/color/empresario.png') }}" width="150px" style="padding: 20px;border-radius: 10px">
                  </p>
              </div>
          </div>

          <div class="row " >
                        <div class="col-12 mt-5">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                              <li class="nav-item mr-2">
                                <a class="nav-link active a-perso" id="pills-perfil-tab" data-toggle="pill" href="#perfil2" role="tab" aria-controls="perfil2" aria-selected="true" style="background-color: #24F1C3;color: #000;font-weight: bold;border-radius: 5px 10px 10px 5px;clip-path: polygon(0% 0%, 0% 100%, 85% 100%, 100% 50%, 85% 0%);">
                                    Datos de perfil
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link a-perso" id="pills-Seguridad2-tab" data-toggle="pill" href="#pills-Seguridad2" role="tab" aria-controls="pills-Seguridad2" aria-selected="false" style="background-color: #24C4FB;color: #fff;font-weight: bold;border-radius: 5px 10px 10px 5px;clip-path: polygon(0% 0%, 15% 50%,0% 100%, 75% 100%, 100% 50%, 75% 0%);">
                                    Seguridad
                                </a>
                              </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                              <div class="tab-pane fade show active" id="perfil2" role="tabpanel" aria-labelledby="pills-perfil2-tab">

                                 <label for="">
                                     <p class="text-white"><strong>Correo</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
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
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/call.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                                </div>


                                 <label for="">
                                     <p class="text-white"><strong>Direccion</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal" >
                                             <img class="" src="{{ asset('img/icon/white/marcador-de-posicion.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                                </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de nacimiento</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text input-modal" >
                                         <img class="" type="date" src="{{ asset('img/icon/white/calendario (2).png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                                 <label for="">
                                     <p class="text-white"><strong>Referencia</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-modal" >
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

                                      <button class="btn btn-lg btn-success btn-save mb-5">
                                          <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                          Actualizar
                                     </button>

                                  </div>

                              </div>

                              <div class="tab-pane fade" id="pills-Seguridad2" role="tabpanel" aria-labelledby="pills-Seguridad-tab">

                                 <label for="">
                                     <p class="text-white"><strong>Contraseña</strong></p>
                                 </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
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
                                        <span class="input-group-text input-modal">
                                             <img class="" src="{{ asset('img/icon/white/password.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="correo@correo.com" style="border-radius: 0  10px 10px 0;">
                                </div>

                                  <div class="col-12 text-center mt-5 mb-5">

                                      <button class="btn btn-lg btn-success btn-save mb-5">
                                          <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                          Actualizar
                                      </button>

                                  </div>

                              </div>

                            </div>

                        </div>
                    </div>
      </div>

    </div>
  </div>
</div>

