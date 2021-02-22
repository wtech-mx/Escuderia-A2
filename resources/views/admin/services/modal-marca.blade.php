                        <div class="modal fade" id="Marca" tabindex="-1" aria-labelledby="MarcaLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">

                              <div class="modal-body">

                                  <div class="col-12">
                                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                        <img class="d-inline mb-2" src="{{ asset('img/icon/black/boton-circular-plus (1).png') }}" alt="Icon documento" width="20px">
                                        Agregar Marca
                                    </p>
                                  </div>
                                    <form method="POST" action="{{route('store.marca')}}" enctype="multipart/form-data" role="form">
                                       @csrf
                                            <div class="col-12 ">
                                                <p class="text-center">

                                                        <div class="input-group form-group">
                                                            <div class="input-group-prepend " >
                                                                <span class="input-group-text input-services" >
                                                                     <img class="" src="{{ asset('img/icon/white/garantia.png') }}" width="25px" >
                                                                </span>
                                                            </div>

                                                            <input type="text" class="form-control" placeholder="Nombre de la Marca" style="border-radius: 0  10px 10px 0;background-color: #050F55;color: #FFFFFF" id="nombre" name="nombre">
                                                        </div>
                                                </p>

                                                <p class="text-center">
                                                    <button class="btn btn-save text-white">
                                                        <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                                        Guardar
                                                    </button>
                                                </p>
                                            </div>
                                   </form>
                              </div>


                            </div>
                          </div>
                        </div>

