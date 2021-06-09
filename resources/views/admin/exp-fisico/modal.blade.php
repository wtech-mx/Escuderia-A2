<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detalles {{ $item->User->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('create_admin.view-factura-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Facturas
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpFactura->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-tenencia-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Tenencias
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpTenencias->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-cr-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Carta Responsiva
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpCarta->count() }}
                    @endif
                </a>

                <a href="{{ route('create_admin.view-poliza-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Póliza de Seguro
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpPoliza->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-tc-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    tarjeta de circulaci&oacute;n
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpTc->count() }}
                    @endif
                </a>

                <a href="{{ route('create_admin.view-reemplacamiento-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Reemplacamiento
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpReemplacamiento->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-certificado-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Verificaci&oacute;n
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpCertificado->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-bp-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Baja de placas
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpPlacas->count() }}
                    @endif
                </a>

                <a href="{{ route('create_admin.view-ine-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    INE
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpIne->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-cd-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    Comprobante de domicilio
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpDomicilio->count() }}
                    @endif
                </a>
                <a href="{{ route('create_admin.view-rfc-admin', $item->id) }}" role="button"
                    class="btn btn-secondary mt-3">
                    RFC
                    @if ($item->User->id == $item->id_user)
                        {{ $item->ExpRfc->count() }}
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>
