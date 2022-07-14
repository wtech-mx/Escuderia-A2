<div class="modal fade" id="pdfModal{{$item->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3">Documentos para el cliente</h3>
                <a type="button" class="btn mt-3" target="_blank"
                    href="https://wa.me/52{{$item->Cotizacion->User->telefono}}?text=Hola%2C+{{$item->Cotizacion->User->name}}%3A%0D%0ATe+mandamos+los+videos+de+tu+auto.%0D%0ADa+click+en+el+siguente+enlace%0D%0A%0D%0A{{route('videos.cotizacion', $item->id_cotizacion)}}"
                    style="background: #00BB2D; color: #ffff">
                    Hoja de servicio
                </a>

                <a type="button" class="btn btn-secondary mt-3" target="_blank"
                    href="https://wa.me/52{{$item->Cotizacion->User->telefono}}?text=Hola%2C+{{$item->Cotizacion->User->name}}%3A%0D%0ATe+mandamos+tu+Hoja+de+diagnostico+de+tu+auto.%0D%0ADa+click+en+el+siguente+enlace%0D%0A%0D%0A{{ route('edit.diagnostico', $item->id) }}">
                    Hoja de Diagnostico
                </a>

                <a type="button" class="btn btn-primary mt-3"
                    href="{{route('print.cotizacion', $item->id_cotizacion)}}">
                    Descargar Cotización
                </a>

                <hr>

                <h3 class="mt-3">Documentos para el administrador</h3>

                <a class="btn btn-success mt-2" href="{{route('print.cotizacion', $item->id_cotizacion)}}" style="background: #000000; color: #ffff">
                    Descargar Cotizaciòn
                </a>

                <a class="btn btn-success mt-2" href="{{route('printf.remision', $item->id_cotizacion)}}">
                    Descargar Remision
                </a>
            </div>
        </div>
    </div>
</div>
