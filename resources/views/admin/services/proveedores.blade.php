                        <div class="modal fade" id="proveedores" tabindex="-1" aria-labelledby="proveedoresLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-header">
                                    <p class="text-center text-dark" style="font: normal normal bold 20px Segoe UI;">Agregar Proveedores</p>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 18px/31px Segoe UI;">
                                        Proveedor 1
                                    </p>
                                  </div>
                                                <div class="col-12">
                                                       <div class="col-12 p-4">
                                                            <div class="d-flex justify-content-between">
                                                              <div class="mr-auto">
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
                                                              <div class="mr-auto">
                                                                        <div class="input-group form-group ">
                                                                             <!-- Button trigger modal -->
                                                                            <a  class="btn bg-white" data-toggle="modal" data-target="#Marca">
                                                                                <img class="" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" width="25px" >
                                                                            </a>
                                                                        </div>
                                                              </div>
                                                            </div>
                                                       </div>
                                                </div>

                                                <div class="input-group">
                                                    <div class="col-6">
                                                         <label for="">
                                                             <p><strong>Garantia</strong></p>
                                                         </label>

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend " >
                                                                <span class="input-group-text input-services" >
                                                                     <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Garantia" style="border-radius: 0  10px 10px 0;" id="garantia" name="garantia" required>
                                                        </div>
                                                    </div>

                                                     <div class="col-6">
                                                         <label for="">
                                                            <p><strong>Proveedor</strong></p>
                                                        </label>

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend " >
                                                                    <span class="input-group-text input-services" >
                                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                                    </span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Proveedor" style="border-radius: 0  10px 10px 0;" id="proveedor" name="proveedor" required>
                                                        </div>
                                                     </div>
                                                </div>

                                                <div class="input-group">
                                                  <div class="col-6">
                                                     <label for="">
                                                         <p><strong>Costo</strong></p>
                                                     </label>

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend " >
                                                                <span class="input-group-text input-services" >
                                                                     <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                                </span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id="costo" name="costo" required>
                                                        </div>
                                                  </div>

                                                  <div class="col-6">
                                                     <label for="">
                                                         <p><strong>Mano de Obra</strong></p>
                                                     </label>

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend " >
                                                                <span class="input-group-text input-services" >
                                                                     <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                                </span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Mano de Obra" style="border-radius: 0  10px 10px 0;" id="mano_o" name="mano_o" required>
                                                        </div>
                                                  </div>
                                                </div>

                                                 <label for="">
                                                     <p><strong>Nombre</strong></p>
                                                 </label>

                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Nombre" style="border-radius: 0  10px 10px 0;" id="nombre" name="nombre" required>
                                                    </div>

                                                <hr>

                                              <div class="col-12">
                                                <p class="text-center text-dark" style="font: normal normal bold 18px/31px Segoe UI;">
                                                    Proveedor 2
                                                </p>
                                              </div>

                                                <div class="input-group">
                                                  <div class="col-6">
                                                      <label for="">
                                                         <p><strong>Marca</strong></p>
                                                     </label>
                                                      <div class="d-flex justify-content-between">
                                                          <div class="mr-auto">
                                                               <div class="input-group form-group ">
                                                                   <div class="input-group-prepend " >
                                                                        <span class="input-group-text input-services" >
                                                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                                        </span>
                                                                   </div>
                                                                   <select class="form-control input-edit-car" id="id_marca2" name="id_marca2" value="{{ old('id_marca2') }}">
                                                                        <option>Selecciona la marca</option>
                                                                            @foreach($marca as $item)
                                                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                                            @endforeach
                                                                   </select>
                                                               </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="col-6">
                                                     <label for="">
                                                         <p><strong>Garantia</strong></p>
                                                     </label>
                                                     <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Garantia" style="border-radius: 0  10px 10px 0;" id="garantia2" name="garantia2" required>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="input-group">
                                                  <div class="col-6">
                                                    <label for="">
                                                        <p><strong>Proveedor</strong></p>
                                                    </label>
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Proveedor" style="border-radius: 0  10px 10px 0;" id="proveedor2" name="proveedor2" required>
                                                    </div>
                                                  </div>

                                                  <div class="col-6">
                                                    <label for="">
                                                     <p><strong>Costo</strong></p>
                                                 </label>
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id="costo2" name="costo2" required>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="input-group">
                                                  <div class="col-6">
                                                    <label for="">
                                                     <p><strong>Mano de Obra</strong></p>
                                                 </label>
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Mano de Obra" style="border-radius: 0  10px 10px 0;" id="mano_o2" name="mano_o2" required>
                                                    </div>
                                                  </div>

                                                  <div class="col-6">
                                                    <label for="">
                                                     <p><strong>Nombre</strong></p>
                                                 </label>
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend " >
                                                            <span class="input-group-text input-services" >
                                                                 <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Nombre" style="border-radius: 0  10px 10px 0;" id="nombre2" name="nombre2" required>
                                                    </div>
                                                  </div>
                                                </div>

                                            </div>

                            </div>
                          </div>
                        </div>
