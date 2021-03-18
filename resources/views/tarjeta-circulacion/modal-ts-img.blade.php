<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border: 5px solid #000000">

            <div class="modal-body" style="background-color: #FFFFFF;border: 3px solid #FFFFFF;border-radius: 30px;">

                <div class="col-12">
                    <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                        Agregar Imagen
                    </p>
                </div>

                <form method="POST" action="{{route('store.exp-tc')}}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="col-12 mt-3">

                        <div class=" custom-file mb-3" style="display: none">
                            <input type="number" class="custom-file-input input-group-text" name="id_tc" id="id_tc" value="{{$tarjeta_circulacion->id}}">
                        </div>

                        <label for="">
                            <p class="text-dark"><strong>Elegir Img</strong></p>
                        </label>

                        <div class=" custom-file mb-3">
                            <input type="file" class="custom-file-input input-group-text" name="tc" id="tc">
                            <label class="custom-file-label">Elegir img...</label>
                        </div>

                        <button class="btn btn-lg btn-save-neon text-white">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                            Guardar
                        </button>

                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
