<!-- Modal -->
<div class="modal fade" id="modalNotasUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Notas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('update.notas', $item->id) }}" enctype="multipart/form-data"
                    role="form">
                    @csrf

                    <label for="">
                        <p><strong>Usuario</strong></p>
                    </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                    width="25px">
                            </span>
                        </div>
                        <select class="form-control" id="id_user" name="id_user">
                            <option value="{{ $item->id_user }}">{{ $item->User->name }}</option>
                            @foreach ($users as $item2)
                                <option value="{{ $item2->id }}">{{ $item2->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <label for="">
                        <p><strong>Notas</strong></p>
                    </label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}"
                                    width="25px">
                            </span>
                        </div>
                        <textarea class="form-control" id="nota" name="nota">{{ $item->nota }}</textarea>
                    </div>

                    <button class="btn btn-lg btn-success btn-save-neon text-white mt-4"
                        style="margin-bottom: 8rem !important;">
                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                        Guardar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
