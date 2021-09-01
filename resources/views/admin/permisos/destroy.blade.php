<!-- Modal -->
<div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <form method="POST" action="{{ route('destroy.role', $item->id) }}" enctype="multipart/form-data" role="form">

        @csrf

        @method('DELETE')

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Role </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img src="https://www.creativefabrica.com/wp-content/uploads/2019/02/Alert-Icon-by-arus-1-580x386.jpg"
                                    style="width: 200px">
                            </div>

                            <h3 class="text-center p-2">Desea eliminar el role: {{ $item->name }} ? </h3>

                            <p class="text-center mt-2">Una vez, eliminado no se puede recuperar</p>



                            <div class="d-flex justify-content-center p-2">

                                <div class="content p-2">
                                    <input type="submit" class="btn  btn-lg btn-secondary mr-1 d-block" value="SI"
                                        style="color: #fff">
                                </div>

                                <div class="content p-2">
                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">No</button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>

</div>
