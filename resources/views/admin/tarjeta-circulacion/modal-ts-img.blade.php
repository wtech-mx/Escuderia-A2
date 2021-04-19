<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" style="background-color: #050f55;border: 3px solid #050f55;border-radius: 30px;">

                <div class="col-12">
                    <p class="text-center text-white" style="font: normal normal bold 23px/31px Segoe UI;">
                        Agregar Datos
                    </p>
                </div>

                <form method="POST" action="{{route('store_admin.tarjeta-circulacion')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="col-12 mt-3">

                        <div class=" custom-file mb-3" style="display: none">
                            <input type="number" class="custom-file-input input-group-text" name="current_auto" id="current_auto" value="{{$tarjeta_circulacion->current_auto}}">
                        </div>

                        <div class=" custom-file mb-3" style="display: none">
                            <input type="number" class="custom-file-input input-group-text" name="id_user" id="id_user" value="{{$tarjeta_circulacion->id_user}}">
                        </div>

                        <label for="">
                            <p class="text-white"><strong>Elegir Img</strong></p>
                        </label>

                        <div class=" custom-file mb-3">
                            <input type="file" class="custom-file-input input-group-text" name="tc" id="tc">
                            <label class="custom-file-label">Elegir img...</label>
                        </div>

                        <button type="submit mt-5" class="btn btn-success btn-save text-white" style="background-color: #38c172 !important;">
                            <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                            Guardar
                        </button>

                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
