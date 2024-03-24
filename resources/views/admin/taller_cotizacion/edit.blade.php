<div class="modal fade" id="servicio-{{ $item->id }}" tabindex="-1" aria-labelledby="servicio" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="{{route('update.servicios_taller', $item->id)}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                        <div class="col-12 ">
                            <p class="text-center">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/garantia.png') }}" width="25px" >
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $item->servicio }}" style="border-radius: 0  10px 10px 0;" id="servicio" name="servicio">
                                </div>
                            </p>

                            <p class="text-center">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend " >
                                        <span class="input-group-text input-services" >
                                            <img class="" src="{{ asset('img/icon/white/garantia.png') }}" width="25px" >
                                        </span>
                                    </div>

                                    <input type="number" class="form-control" value="{{ $item->precio }}" style="border-radius: 0  10px 10px 0;" id="precio" name="precio">
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

