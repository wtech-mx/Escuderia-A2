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
                                                <a class="nav-link active" id="pills-Empresa-tab" data-toggle="pill" href="#pills-Empresa-frenos" role="tab" aria-controls="pills-Empresa" aria-selected="true">
                                                    <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                    Empresa
                                                </a>
                                            </li>



                                            <li class="nav-item bg-white">
                                                <a class="nav-link text-dark" id="pills-Usuario-tab" data-toggle="pill" href="#pills-Usuario-frenos" role="tab" aria-controls="pills-Usuario" aria-selected="false">
                                                    <img class="" src="{{ asset('img/icon/color/empresario.png') }}" width="25px" >
                                                    Usuario
                                                </a>
                                            </li>
                                          @endif
                                          @if (auth()->user()->empresa == 1)
                                            <li class="nav-item bg-white">
                                                <a class="nav-link active" id="pills-Empresa-tab" data-toggle="pill" href="#pills-Empresa" role="tab" aria-controls="pills-Empresa" aria-selected="true">
                                                    <img class="" src="{{ asset('img/icon/color/edificio-de-oficinas (3).png') }}" width="25px" >
                                                    Sector
                                                </a>
                                            </li>
                                          @endif
                                        </ul>
                                      </div>


                                    <div class="tab-content p-4" id="pills-tabContent">
                                        @if (auth()->user()->empresa == 0)
                                      <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa-frenos" role="tabpanel" aria-labelledby="pills-Empresa-frenos-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Empresa</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                </span>
                                            </div>

                                                  <select class="form-control empresa_freno" id="id_empresafr" name="id_empresafr">
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

                                            <select class="form-control" id="current_autofr2" name="current_autofr2">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>

                                      <div class="tab-pane fade mr-4 ml-4" id="pills-Usuario-frenos" role="tabpanel" aria-labelledby="pills-Usuario-frenos-tab">

                                         <label for="">
                                             <p class="text-white"><strong>Usuario</strong></p>
                                         </label>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend " >
                                                <span class="input-group-text input-services" >
                                                     <img class="" src="{{ asset('img/icon/white/hombre (1).png') }}" width="25px" >
                                                </span>
                                            </div>

                                                 <select class="form-control user_freno" id="id_userfr" name="id_userfr" value="{{ old('id_userfr') }}">
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

                                            <select class="form-control" id="current_autofr" name="current_autofr">
                                              <option value="">Seleccione auto</option>
                                            </select>
                                        </div>

                                      </div>
                                      @endif
                                      @if (auth()->user()->empresa == 1)
                                            <div class="tab-pane fade show active mr-4 ml-4" id="pills-Empresa" role="tabpanel" aria-labelledby="pills-Empresa-tab">

                                                <label for="">
                                                    <p class="text-white"><strong>Sectores</strong></p>
                                                </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                            <img class="" src="{{ asset('img/icon/white/edificio-de-oficinas.png') }}" width="25px" >
                                                    </span>
                                                </div>

                                                    <select class="form-control" id="id_empresa" name="id_empresa" value="{{ old('id_empresa') }}">
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
                                            </div>
                                        @endif

                                    </div>

                                    {{--/*|----------------------------------------------------------------------------}}
                                    {{--Tab Empres o User--}}
                                    {{--|--------------------------------------------------------------------------*/--}}

                                  </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Frenos delanteras?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="frenos_delanteras" id="frenos_delanteras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                   Si
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="frenos_delanteras" id="frenos_delanteras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  No
                                              </label>
                                            </div>

                                  </div>

                                  <div class="col-12 text-center">

                                            <h2 class="subtitle-form-servi p-3">
                                                ¿Frenos Trasera?
                                            </h2>

                                            <div class="form-check form-check-inline mr-4 ml-4">

                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input " type="radio" name="frenos_traseras" id="frenos_traseras" value="1">
                                                </div>

                                                <label class="form-check-label text-white" for="inlineRadio1">
                                                    Si
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline mr-4 ml-4">
                                                <div class="d-flex justify-content-center">
                                                    <input class="form-check-input  d-block" type="radio" name="frenos_traseras" id="frenos_traseras" value="0">
                                                </div>
                                              <label class="form-check-label text-white" for="inlineRadio2">
                                                  No
                                              </label>
                                            </div>
                                  </div>


                                  <div class="col-12 p-4">

                                        <input type="button" class="proveedor1" id="proveedor1" value="Agregar proveedor">
                                        <div id="nuevo-form1"></div>

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

                                            <input type="hidden" class="form-control" placeholder="servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio" value="3">
                                         <hr>
                                         <label for="">
                                             <p class="text-white"><strong>Vida de freno en KM</strong></p>
                                         </label>

                                            <div class="input-group form-group">
                                                <div class="input-group-prepend " >
                                                    <span class="input-group-text input-services" >
                                                         <img class="" src="{{ asset('img/icon/white/velocimetro.png') }}" width="25px" >
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="vida freno" style="border-radius: 0  10px 10px 0;" id="vida_llantas" name="vida_llantas" value="{{ old('vida_llantas') }}">
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
                                             $('#id_userfr').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_user no esta en la tabla de automovil
                                                    $('#current_autofr').empty();
                                                    $('#current_autofr').append(`<option value="" disabled selected>Procesando..</option>`);
                                                 $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/' + id,
                                                    success: function (response) {
                                                        var response = JSON.parse(response);
                                                        console.log(response);
                                                        //trae los automoviles relacionados con el id_user
                                                        $('#current_autofr').empty();
                                                        $('#current_autofr').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                        response.forEach(element => {
                                                            $('#current_autofr').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                     </script>
                                  <!-- Select anidado Empresa-->
                                    <script>
                                                    $(document).ready(function () {
                                                    $('#id_empresafr').on('change', function () {
                                                    let id = $(this).val();
                                                    //id_empresa no esta en la tabla de automovil
                                                    $('#current_autofr2').empty();
                                                    $('#current_autofr2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                    $.ajax({
                                                    type: 'GET',
                                                    url: 'crear/empresa/' + id,
                                                    success: function (response) {
                                                    var response = JSON.parse(response);
                                                    console.log(response);
                                                    //trae los automoviles relacionados con el id_empresa
                                                    $('#current_autofr2').empty();
                                                    $('#current_autofr2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                    response.forEach(element => {
                                                        $('#current_autofr2').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                <script>
                                    $(document).ready(function () {
                                        $('#id_empresafr').on('change', function () {
                                            let id = $(this).val();
                                            //id_empresafr no esta en la tabla de automovil
                                            $('#current_autofr2').empty();
                                            $('#current_autofr2').append(`<option value="" disabled selected>Procesando..</option>`);
                                                $.ajax({
                                                type: 'GET',
                                                url: 'crear/sector/' + id,
                                                success: function (response) {
                                                var response = JSON.parse(response);
                                                console.log(response);
                                                //trae los automoviles relacionados con el id_empresafr
                                                $('#current_autofr2').empty();
                                                $('#current_autofr2').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                                                response.forEach(element => {
                                                    $('#current_autofr2').append(`<option value="${element['id']}">${element['submarca']} - ${element['placas']}</option>`);
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>

                                  <script>
                                    var agregar1 = document.getElementById('proveedor1');
                                    var contenedor1 = document.getElementById('nuevo-form1');
                                    var contador = 0;

                                    agregar1.addEventListener('click', function(){
                                        contador++;
                                        var _form1 = '<hr><label class="subtitle-form-servi">Proveedor '+ contador +'</label>' +
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

                                        contenedor1.innerHTML += _form1;
                                    })

                                    //remove fields group
                                    // $("body").on("click",".remove",function(){
                                    //     $(this).parents("._form").remove();
                                    // });
                                </script>
                              </form>

