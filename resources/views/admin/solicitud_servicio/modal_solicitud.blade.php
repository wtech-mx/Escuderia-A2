<!-- Modal -->
<div class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="modalSolicitud" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center"
                            style="color: var(--unnamed-color-050f55);font: normal normal bold 25px/33px Segoe UI;">
                             Crea una solicitud de servicio
                        </h2>
                    </div>
                </div>

                <div class="card car-modal-ss">
                    <div class="card-body">


                        <form method="POST" action="{{route('store.cotizacion_taller')}}" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="">
                                        <p class="text-dark"><strong>Fecha</strong></p>
                                    </label>

                                <div class="input-group form-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background: #0CD935;">
                                            <i class="fas fa-signature icon-tc"></i>
                                        </span>
                                    </div>

                                    <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion" value="{{ date("Y-m-d"); }}" readonly>
                                </div>
                                </div>

                                <div class="col-6">
                                    <label for="">
                                        <p class="text-dark"><strong>KM Actual</strong></p>
                                    </label>

                                <div class="input-group form-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background: #0CD935;">
                                            <i class="fas fa-signature icon-tc"></i>
                                        </span>
                                    </div>

                                    <input type="number" class="form-control" name="km_actual" id="km_actual" >
                                </div>
                                </div>

                                {{-- <div class="col-12">
                                    <label for="">
                                        <p class="text-dark"><strong>Seleccionar Usuario</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background: #0CD935;">
                                                <i class="fas fa-users icon-tc"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" id="id_userco" name="id_userco">
                                            <option value="">Seleccione Cliente</option>

                                        @foreach ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <label for="">
                                        <p class="text-dark"><strong>Seleccionar Vehiculo</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background: #0CD935;">
                                                <i class="fas fa-car icon-tc"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" id="current_auto" name="current_auto">
                                            <option value="">seleccione auto</option>
                                            @foreach ($automoviles as $item)
                                                <option value="{{ $item->id }}">{{ $item->placas }} / {{ $item->submarca }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="">
                                        <p class="text-dark"><strong>Ubicación</strong></p>
                                    </label>

                                <div class="input-group form-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background: #0CD935;">
                                            <i class="fas fa-signature icon-tc"></i>
                                        </span>
                                    </div>

                                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" >
                                </div>
                                </div>

                                <div class="col-12">
                                    <label for="">
                                        <p class="text-dark"><strong>Describe el serv./falla</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <textarea name="comentario" id="comentario" cols="60" rows="10" style="border: solid #0CD935;"></textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="">
                                        <p class="text-dark"><strong>Titulo</strong></p>
                                    </label>

                                <div class="input-group form-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background: #0CD935;">
                                            <i class="fas fa-image icon-tc"></i>
                                        </span>
                                    </div>

                                    <input type="text" class="form-control" name="titulo_img" id="titulo_img" placeholder=" 'Foto de bateria' ">
                                </div>

                                </div>

                                <div class="col-6">
                                    <label for="">
                                        <p class="text-dark"><strong>Foto</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background: #0CD935;">
                                                <i class="fas fa-image icon-tc"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" name="img" id="img">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="">
                                        <p class="text-dark"><strong>Galeria</strong></p>
                                    </label>

                                    <div class="input-group form-group mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background: #0CD935;">
                                                <i class="fas fa-image icon-tc"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" name="img_galeria[]" id="img_galeria[]" multiple>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-3 " style="margin-bottom: 8rem !important;">
                                    <button class="btn btn-lg btn-save-neon text-white">
                                        <i class="fas fa-save icon-tc"></i>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@section('js')
<script src="{{ asset('js/select2.full.min.js') }}"></script>


@endsection
