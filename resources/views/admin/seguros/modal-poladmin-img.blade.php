<div class="modal fade" id="exampleModalpoliza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" >

                <div class="col-12">
                    <p class="text-center" style="font: normal normal bold 23px/31px Segoe UI;">
                        Agregar Foto
                    </p>
                </div>

                <form method="POST" action="{{route('store_admin_s.exp-poliza')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="col-12 mt-3">

                        <label for="">
                            <p><strong>Agregar Foto P&oacute;liza</strong></p>
                        </label>

                        <div class=" custom-file mb-3">
                            <input type="file" class="custom-file-input input-group-text" name="poliza" id="poliza">
                        </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id='id_user' name="id_user" value="{{$seguro->id_user}}">
                            </div>
                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" placeholder="Costo" style="border-radius: 0  10px 10px 0;" id='current_auto' name="current_auto" value="{{$seguro->current_auto}}">
                            </div>

                            <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}"
                                    width="20px">
                                Guardar
                            </button>

                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
