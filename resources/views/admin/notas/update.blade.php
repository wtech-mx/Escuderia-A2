@php
$fechaEntera = strtotime($item->created_at);
$anio = date('Y', $fechaEntera);
$mes = date('m', $fechaEntera);
$dia = date('d', $fechaEntera);
@endphp
<!-- Modal -->
<div class="modal fade" id="modalNotasUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>Notas</strong></h5>
                <a type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-window-close text-white" aria-hidden="true"></i>
                </a>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('update.notas', $item->id) }}" enctype="multipart/form-data"
                    role="form">
                    @csrf

                    <label class="mb-3" for="">
                        <p><strong>Usuario</strong></p>
                    </label>

                    <div class="input-group form-group">
                        <div class="input-group-prepend ">
                            <span class="input-group-text">
                                <i class="fas fa-user-tag icon-users-edit"></i>
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

                    <label class="mt-3" for="">
                        <p><strong>Historial de Nota</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <textarea class="form-control" rows="5" disabled>
                            @foreach ($notas as $item2)
                                @if ($item2->id_user == $item->id_user)
                                    {{ $dia }}/{{ $mes }}/{{ $dia }} - {{ $item2->nota }}
                                @endif
                            @endforeach
                        </textarea>
                    </div>

                    <label class="mt-3" for="">
                        <p><strong>Editar nota</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <textarea class="form-control" id="nota" name="nota" rows="3">{{ $item->nota }}</textarea>
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
