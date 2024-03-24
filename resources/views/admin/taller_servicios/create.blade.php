<div class="modal fade" id="modal-taller-cot" tabindex="-1" aria-labelledby="MarcaLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Servicio</h5>
                <form method="POST" action="{{route('store.servicios_taller')}}" enctype="multipart/form-data" role="form">
                    @csrf
                        <div class="col-12 ">
                            <p class="text-center">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/black/color-palette.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input type="text" class="form-control" placeholder="Nombre del servicio" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio">
                                </div>
                            </p>

                            <p class="text-center">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/black/bolsa-de-dinero.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input type="number" class="form-control" placeholder="Precio" style="border-radius: 0  10px 10px 0;" id="precio" name="precio">
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

