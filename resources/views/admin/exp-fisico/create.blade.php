@if (auth()->user()->role == 0)
    @php
        switch($rest){
            case($rest == 'factura/view'):
                $numero = 1;
            break;
            case($rest == 'bp/view'):
                $numero = 2;
            break;
            case($rest == 'cd/view'):
                $numero = 3;
            break;
            case($rest == 'cr/view'):
                $numero = 4;
                break;
            case($rest == 'ine/view'):
                $numero = 5;
                break;
            case($rest == 'poliza/view'):
                $numero = 6;
                break;
            case($rest == 'reemplacamiento/view'):
                $numero = 7;
                break;
            case($rest == 'rfc/view'):
                $numero = 8;
                break;
            case($rest == 'tc/view'):
                $numero = 9;
                break;
            case($rest == 'tenencia/view'):
                $numero = 10;
                break;
            case($rest == 'certificado/view'):
                $numero = 11;
                break;
            case($rest == 'inventario/view'):
                $numero = 12;
                break;
        }
    @endphp
    @else
    @php
        switch($rest){
            case($rest == 'factura/view/'.$automovil->id):
                $numero = 1;
            break;
            case($rest == 'bp/view/'.$automovil->id):
                $numero = 2;
            break;
            case($rest == 'cd/view/'.$automovil->id):
                $numero = 3;
            break;
            case($rest == 'cr/view/'.$automovil->id):
                $numero = 4;
                break;
            case($rest == 'ine/view/'.$automovil->id):
                $numero = 5;
                break;
            case($rest == 'poliza/view/'.$automovil->id):
                $numero = 6;
                break;
            case($rest == 'reemplacamiento/view/'.$automovil->id):
                $numero = 7;
                break;
            case($rest == 'rfc/view/'.$automovil->id):
                $numero = 8;
                break;
            case($rest == 'tc/view/'.$automovil->id):
                $numero = 9;
                break;
            case($rest == 'tenencia/view/'.$automovil->id):
                $numero = 10;
                break;
            case($rest == 'certificado/view/'.$automovil->id):
                $numero = 11;
                break;
            case($rest == 'inventario/view/'.$automovil->id):
                $numero = 12;
                break;
        }
    @endphp
@endif


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="col-12">
                            <p class="text-center text-dark" style="font: normal normal bold 23px/31px Segoe UI;">
                                Agregar Imagen
                            </p>
                        </div>

                        @if (auth()->user()->role == 0)
                        <form id="fileUploadForm" method="POST" action="{{ route('store.expexpediente') }}"
                            enctype="multipart/form-data" role="form">
                        @else
                        <form id="fileUploadForm" method="POST" action="{{ route('store_admin.expedientes', $automovil->id) }}"
                            enctype="multipart/form-data" role="form">
                        @endif

                            @csrf

                            <div class="col-12">
                                <label for="">
                                    <p class="text-white"><strong>T&iacute;tulo</strong></p>
                                </label>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-modal">
                                            <img class="" src="{{ asset('img/icon/white/fuente.png') }}"
                                                width="25px">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Titulo" id="titulo"
                                        name="titulo" style="border-radius: 0  10px 10px 0;">
                                </div>
                            </div>

                            <input type="hidden" id="numero" name="numero" value="{{$numero}}">

                            <div class="col-12 mt-3">
                                <div class=" custom-file mb-3 fallback">
                                    <input type="file" class="custom-file-input input-group-text" id="img" name="img">
                                </div>

                                <div class="form-group">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-lg btn-save-dark text-white mt-5">
                                    <img class="align-items-center" src="{{ asset('img/icon/white/save-file-option (1).png') }}"
                                        width="20px">
                                    Guardar
                                </button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- <script>
            Dropzone.options.myAwesomeDropzone = {
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
                ''
            };
        </script> --}}
