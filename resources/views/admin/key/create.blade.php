<!-- Modal -->
<div class="modal fade" id="modalLlave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>Crear Llave</strong></h5>
                <a type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-window-close text-white" aria-hidden="true"></i>
                </a>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <form method="POST" action="{{ route('store.key') }}" enctype="multipart/form-data" role="form">
                        @csrf

                        <label class="mb-3">
                            <p><strong>Empresas</strong></p>
                        </label>

                        <div class="input-group form-group">
                            <div class="input-group-prepend ">
                                <span class="input-group-text" style="background-image: linear-gradient(to bottom, #00d62e, #2ce048, #43eb5f, #56f574, #68ff88);
                                border: none;">
                                    <i class="fas fa-user-tag icon-users-edit"></i>
                                </span>
                            </div>

                            <select class="form-control" id="id_empresa" name="id_empresa">
                                <option value="">Seleccione empresa</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ ucfirst($item->name) }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label class="mt-3">
                                    <p><strong>Llave</strong></p>
                                </label>
                                @php
                                    function generateRandomString($length = 6) {
                                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        $charactersLength = strlen($characters);
                                        $randomString = '';
                                        for ($i = 0; $i < $length; $i++) {
                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                        }
                                        return $randomString;
                                    }
                                @endphp

                                <div class="input-group form-group mb-5">
                                    <input class="form-control" id="codigo" name="codigo" value="{{generateRandomString($length = 6)}}">
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="mt-3">
                                    <p><strong>Fecha Caducidad</strong></p>
                                </label>

                                <div class="input-group form-group mb-5">
                                    <input type="date" class="form-control" id="caducidad" name="caducidad">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="estatus" name="estatus" value="1">

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
</div>
