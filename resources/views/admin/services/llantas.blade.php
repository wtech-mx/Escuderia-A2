
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
                                            <a class="nav-link text-dark" id="pills-Usuario-tab" data-toggle="pill" href="#pills-Usuario" role="tab" aria-controls="pills-Usuario" aria-selected="false">
                                                <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                Usuario
                                            </a>
                                          </li>
                                        </ul>
                                     </div>
                                     <div class="tab-content" id="pills-tabContent">

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

                                                <select class="form-control" id="id_empresa" name="id_empresa" value="{{ old('id_empresa') }}">
                                                     <option value="">Seleccione empresa</option>
                                                     @foreach($empresa as $item)
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

                                            <select class="form-control" id="current_auto" name="current_auto" value="{{ old('current_auto') }}">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario" role="tabpanel" aria-labelledby="pills-Usuario-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control formselect" id="id_user" name="id_user" value="{{ old('id_user') }}">
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

                                            <select class="form-control formselect" id="current_auto2" name="current_auto2" value="{{ old('current_auto2') }}">
                                                    <option value="">Seleccione auto</option>
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Llantas delanteras?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="llantas_delanteras" id="llantas_delanteras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                   1
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="llantas_delanteras" id="llantas_delanteras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  2
                                              </label>
                                            </div>

                                  </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Llantas Trasera?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="llantas_traseras" id="llantas_traseras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                    1
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="llantas_traseras" id="llantas_traseras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  2
                                              </label>
                                            </div>
                                  </div>

                                  <div class="col-12 p-4">

                                        <input type="button" class="proveedor2" id="proveedor2" value="Agregar proveedor">
                                        <div id="nuevo-form2"></div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-12">

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
                                             <p class="text-white"><strong>Fecha Servicio</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-services">
                                                     <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                                </span>
                                            </div>
                                             <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='fecha_servicio' name="fecha_servicio">
                                        </div>

                                         <hr>

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

                                            <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="1">
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

                                         <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">

                                         {{-- <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Imagenes</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" name="file" id="video">
                                          <label class="custom-file-label " for="customFile">Selecciona Imagenes</label>
                                        </div> --}}

                                         {{-- <label for="" class="mt-3">
                                             <p class="text-white"><strong>V&iacute;deo Exterior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="video2" name="video2">
                                          <label class="custom-file-label" for="customFile">Selecciona V&iacute;deo</label>
                                        </div> --}}

                                          <button class="btn btn-lg btn-success btn-save-neon text-white mt-4" style="margin-bottom: 8rem !important;">
                                              <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                                              Guardar
                                          </button>
                                  </div>

                                    <script>
                                         $(document).ready(function () {
                                            $('#id_user').on('change', function () {
                                                let id = $(this).val();
                                                //id_user no esta en la tabla de automovil
                                                $('#current_auto2').empty();
                                                $('#current_auto2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_user
                                                    $('#current_auto2').empty();
                                                    $('#current_auto2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_auto2').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                  <!-- Select anidado Empresa-->
                                    <script>
                                        $(document).ready(function () {
                                            $('#id_empresa').on('change', function () {
                                                let id = $(this).val();
                                                //id_empresa no esta en la tabla de automovil
                                                $('#current_auto').empty();
                                                $('#current_auto').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresa
                                                    $('#current_auto').empty();
                                                    $('#current_auto').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_auto').append(`<option value="${element['id']}">${element['submarca']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                     </script>

                                <script>
                                    var agregar2 = document.getElementById('proveedor2');
                                    var contenedor2 = document.getElementById('nuevo-form2');
                                    var contador = 0;

                                    agregar2.addEventListener('click', function(){
                                        contador++;
                                        var _form2 = '<hr><label class="subtitle-form-servi">Proveedor '+ contador +'</label>' +
                                                    '<div class="row"><div class="col-6">' +
                                                    '<label class="text-white">Pieza o Refacción</label>' +
                                                    '<input type="text" class="form-control" name="nombre[]" placeholder="pieza / Refacción"></div>' +
                                                    '<div class="col-6">' +
                                                    '<label class="text-white">Marca</label>' +
                                                    '<input type="text" class="form-control" name="marca[]" placeholder="Marca"></div></div>' +
                                                    '<div class="row"><div class="col-6">' +
                                                    '<label class="text-white">Garantia</label>' +
                                                    '<input type="text" class="form-control" name="garantia[]" placeholder="Garantia"></div>' +
                                                    '<div class="col-6">' +
                                                    '<label class="text-white">Cantidad</label>' +
                                                    '<input type="number" class="form-control" name="cantidad[]" placeholder="Cantidad"></div></div>' +
                                                    '<div class="row"><div class="col-6">' +
                                                    '<label class="text-white">Costo Unitario</label>' +
                                                    '<input type="number" class="form-control" name="costo[]" placeholder="Costo Unitario"></div>' +
                                                    '<div class="col-6">' +
                                                    '<label class="text-white">Costo Total</label>' +
                                                    '<input type="number" class="form-control" name="costo_total[]" placeholder="Costo total"></div></div>' +
                                                    '<div class="row"><div class="col-6">' +
                                                    '<label class="text-white">Proveedor</label>' +
                                                    '<input type="text" class="form-control" name="proveedor[]" placeholder="Proveedor"></div>' +
                                                    '<div class="col-6">' +
                                                    '<label class="text-white">Mano de Obra</label>' +
                                                    '<input type="number" class="form-control" name="mano_o[]" placeholder="Mano de Obra"></div></div>';

                                        contenedor2.innerHTML += _form2;
                                    })

                                    //remove fields group
                                    // $("body").on("click",".remove",function(){
                                    //     $(this).parents("._form").remove();
                                    // });
                                </script>
                       </form>

