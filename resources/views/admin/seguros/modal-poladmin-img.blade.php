<div class="modal fade" id="exampleModalpoliza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" style="background-color: #050f55;border: 3px solid #050f55;border-radius: 30px;">

                <div class="col-12">
                    <p class="text-center text-white" style="font: normal normal bold 23px/31px Segoe UI;">
                        Agregar Datos
                    </p>
                </div>

                <form method="POST" action="{{route('store_admin.exp-poliza')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="col-12 mt-3">

                        <label for="">
                            <p class="text-white"><strong>Elegir Img P&oacute;liza Admin</strong></p>
                        </label>

                        <div class=" custom-file mb-3">
                            <input type="file" class="custom-file-input input-group-text" name="poliza" id="poliza">
                            <label class="custom-file-label">Elegir img...</label>
                        </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id='id_user' name="id_user" value="{{$seguro->id_user}}">
                            </div>
                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id='current_auto' name="current_auto" value="{{$seguro->current_auto}}">
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
