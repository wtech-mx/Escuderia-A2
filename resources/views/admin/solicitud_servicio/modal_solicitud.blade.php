<!-- Modal -->
<div class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="modalSolicitud" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center"
                            style="color: var(--unnamed-color-050f55);font: normal normal bold 25px/33px Segoe UI;">
                             Crea una solicitud de servicio
                        </h2>
                    </div>
                </div>

                <div class="card car-modal-ss">
                    <div class="card-body row">

                        <div class="col-6">
                            <label for="">
                                <p class="text-dark"><strong>Fecha</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" style="background: #0CD935;">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="date" class="form-control" name="fecha" id="fecha" value="{{ date("Y-m-d"); }}" >
                           </div>
                        </div>

                        <div class="col-6">
                            <label for="">
                                <p class="text-dark"><strong>KM Actual</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" style="background: #0CD935;">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="number" class="form-control" name="ubicacion" id="ubicacion" >
                           </div>
                        </div>

                        <div class="col-12">
                            <label for="">
                                <p class="text-dark"><strong>Seleccionar Usuario</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background: #0CD935;">
                                        <i class="fas fa-users icon-tc"></i>
                                    </span>
                                </div>
                                <select class="form-control" id="id_userco" name="id_userco">
                                    <option value="">Seleccione Cliente</option>

                                   @foreach ($user as $item)
                                       <option value="{{ $item->id }}">{{ $item->name }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="">
                                <p class="text-dark"><strong>Seleccionar Vehiculo</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background: #0CD935;">
                                        <i class="fas fa-car icon-tc"></i>
                                    </span>
                                </div>
                                <select class="form-control" id="current_autoco" name="current_autoco">
                                    <option value="">seleccione auto</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="">
                                <p class="text-dark"><strong>Ubicación</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" style="background: #0CD935;">
                                       <i class="fas fa-signature icon-tc"></i>
                                   </span>
                               </div>

                               <input type="text" class="form-control" name="ubicacion" id="ubicacion" >
                           </div>
                        </div>

                        <div class="col-12">
                            <label for="">
                                <p class="text-dark"><strong>Describe el Problema</strong></p>
                            </label>

                            <div class="input-group form-group mb-5">
                                <textarea name="" id="" cols="60" rows="10" style="border: solid #0CD935;"></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="">
                                <p class="text-dark"><strong>Titulo</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" style="background: #0CD935;">
                                       <i class="fas fa-image icon-tc"></i>
                                   </span>
                               </div>

                               <input type="text" class="form-control" name="" id="" value="" placeholder="Foto de bateria">
                           </div>

                        </div>

                        <div class="col-6">
                            <label for="">
                                <p class="text-dark"><strong>Foto</strong></p>
                            </label>

                           <div class="input-group form-group mb-5">
                               <div class="input-group-prepend">
                                   <span class="input-group-text" style="background: #0CD935;">
                                       <i class="fas fa-image icon-tc"></i>
                                   </span>
                               </div>

                               <input type="file" class="form-control" name="" id="" value="" >
                           </div>

                        </div>

                        <div class="col-12 text-center mt-3 " style="margin-bottom: 8rem !important;">
                            <button class="btn btn-lg btn-save-neon text-white">
                                <i class="fas fa-save icon-tc"></i>
                                Guardar
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@section('js')
<script src="{{ asset('js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.usuario').select2();


        $('#id_userco').on('change', function () {
            let id = $(this).val();
            //id_userco no esta en la tabla de automovil
            $('#current_autoco').empty();
            $('#current_autoco').append(`<option value="" disabled selected>Procesando..</option>`);
            $.ajax({
                type: 'GET',
                url: 'crear/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    //trae los automoviles relacionados con el id_userco
                    $('#current_autoco').empty();
                    $('#current_autoco').append(`<option value="" disabled selected>Seleccione Autom&oacute;vil</option>`);
                    response.forEach(element => {
                        $('#current_autoco').append(`<option value="${element['id']}">${element['placas']}${element['submarca']}</option>`);
                    });
                }
            });
        });
    });
</script>

@endsection
