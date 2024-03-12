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
                                            @if (auth()->user()->empresa == 0)
                                                <li class="nav-item bg-white">
                                                    <a class="nav-link active" id="pills-Empresa-tab" data-toggle="pill" href="#pills-Empresa" role="tab" aria-controls="pills-Empresa" aria-selected="true">
                                                        <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                        Empresa
                                                    </a>
                                                </li>

                                                <li class="nav-item bg-white">
                                                    <a class="nav-link text-dark" id="pills-Usuario-tab" data-toggle="pill" href="#pills-Usuario-aceite" role="tab" aria-controls="pills-Usuario" aria-selected="false">
                                                        <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                        Usuario
                                                    </a>
                                                </li>
                                            @endif
                                            @if (auth()->user()->empresa == 1)
                                                <li class="nav-item bg-white">
                                                    <a class="nav-link active" id="pills-Sector-tab" data-toggle="pill" href="#pills-Sector-aceite" role="tab" aria-controls="pills-Sector" aria-selected="true">
                                                        <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                        Sector
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                      </div>


                                    <div class="tab-content p-4" id="pills-tabContent">
                                        @if (auth()->user()->empresa == 0)
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

                                                        <select class="form-control empresa_aceite" id="id_empresaac" name="id_empresaac">
                                                            <option value="">Seleccione empresa</option>
                                                            @foreach($empresa as $item)
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

                                                        <select class="form-control user_aceite" id="id_userac" name="id_userac" value="{{ old('id_userac') }}">
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

                                                    <select class="form-control" id="current_autoac2" name="current_autoac2">
                                                    <option value="">seleccione auto</option>
                                                    </select>
                                                </div>

                                            </div>
                                        @endif

                                        @if (auth()->user()->empresa == 1)
                                            <div class="tab-pane fade show active mr-4 ml-4" id="pills-Sector-aceite" role="tabpanel" aria-labelledby="pills-Sector-tab">
                                                <label for="">
                                                    <p class="text-white"><strong>Sectores</strong></p>
                                                </label>

                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend " >
                                                        <span class="input-group-text input-services" >
                                                                <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                        </span>
                                                    </div>

                                                        <select class="form-control user_aceite" id="id_empresa" name="id_empresa" value="{{ old('id_empresa') }}">
                                                                <option value="">Seleccione sector</option>
                                                                @foreach($sector as $item)
                                                                <option value="{{$item->id}}">{{ ucfirst($item->sector)}}</option>
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
                                        @endif
                                    </div>
                                  </div>

                                  <div class="col-12 p-4">

                                        <input type="button" class="proveedor3" id="proveedor3" value="Agregar proveedor">
                                        <div id="nuevo-form3"></div>

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

                                            <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="4">
                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Vida de aceite en KM</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="vida aceite" style="border-radius: 0  10px 10px 0;" id="vida_llantas" name="vida_llantas" value="{{ old('vida_llantas') }}">
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

                                         <hr>
                                         {{-- <label for="">
                                             <p class="text-white"><strong>V&iacute;deo Interior</strong></p>
                                         </label>

                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input " id="video" name="video">
                                          <label class="custom-file-label " for="customFile">Selecciona V&iacute;deo</label>
                                        </div>

                                         <label for="" class="mt-3">
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
                                  <!-- Select anidado User-->

                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_userac').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_userac no esta en la tabla de automovil
                                                    $('#current_autoac2').empty();
                                                    $('#current_autoac2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_userac
                                                    $('#current_autoac2').empty();
                                                    $('#current_autoac2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoac2').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
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
                                                    $('#current_autoac').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresaac
                                                    $('#current_autoac').empty();
                                                    $('#current_autoac').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoac').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <script>
                                        $(document).ready(function () {
                                            $('#id_empresaac').on('change', function () {
                                                let id = $(this).val();
                                                //id_empresaac no esta en la tabla de automovil
                                                $('#current_autoac').empty();
                                                $('#current_autoac').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/sector/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresaac
                                                    $('#current_autoac').empty();
                                                    $('#current_autoac').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autoac').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                  <script>
                                    var agregar3 = document.getElementById('proveedor3');
                                    var contenedor3 = document.getElementById('nuevo-form3');
                                    var contador = 0;

                                    agregar3.addEventListener('click', function(){
                                        contador++;
                                        var _form3 = '<hr><label class="subtitle-form-servi">Proveedor '+ contador +'</label>' +
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

                                        contenedor3.innerHTML += _form3;
                                    })

                                    //remove fields group
                                    // $("body").on("click",".remove",function(){
                                    //     $(this).parents("._form").remove();
                                    // });
                                </script>
                      </form>
