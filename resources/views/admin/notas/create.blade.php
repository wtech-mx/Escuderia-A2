<!-- Modal -->
<div class="modal fade" id="modalNotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>Notas</strong></h5>
                <a type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-window-close text-white" aria-hidden="true"></i>
                </a>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('store.notas') }}" enctype="multipart/form-data" role="form">
                    @csrf

                    <label class="mb-3" for="">
                        <p><strong>Usuario</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);
                            border: none;">
                                <i class="fas fa-user-tag icon-users-edit"></i>
                            </span>
                        </div>

                        <select class="form-control" id="id_user" name="id_user">
                            <option value="">Seleccione usuario</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->name) }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <label class="mt-3" for="">
                        <p><strong>Notas</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <textarea class="form-control" id="nota" name="nota" rows="3"></textarea>
                    </div>

                    <button class="btn btn-lg btn-success btn-save-neon text-white"
                        style="margin-bottom: 1rem !important;">
                        <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                        Guardar
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
