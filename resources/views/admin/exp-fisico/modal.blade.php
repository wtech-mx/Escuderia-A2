<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Archivos {{ $item->User->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-5" style="">

                <div class="d-flex justify-content-between">

                    <a href="{{ route('create_admin.view-factura-admin',$item->id) }}">
                        <span class="badge bg-primary" style="font-size: 70%;">
                            Facturas
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpFactura->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-tenencia-admin',$item->id) }}">
                        <span class="badge bg-primary" style="font-size: 70%;">
                            Tenencias
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpTenencias->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-cr-admin',$item->id) }}">
                        <span class="badge bg-primary" style="font-size: 70%;">
                            Carta Responsiva
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpCarta->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-poliza-admin',$item->id) }}">
                        <span class="badge bg-primary" style="font-size: 70%;">
                            Póliza de Seguro
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpPoliza->count() }}
                            @endif
                        </span>
                    </a>

                </div>

                <div class="d-flex justify-content-between">

                    <a href="{{ route('create_admin.view-tc-admin',$item->id) }}">
                        <span class="badge bg-secondary" style="font-size: 70%;">
                            Tarjeta C.
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpTc->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                        <span class="badge bg-secondary" style="font-size: 70%;">
                            Reemplacamiento
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpReemplacamiento->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                        <span class="badge bg-secondary" style="font-size: 70%;">
                            Verificacion
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpCertificado->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-bp-admin',$item->id) }}">
                        <span class="badge bg-secondary" style="font-size: 70%;">
                            Baja de placas
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpPlacas->count() }}
                            @endif
                        </span>
                    </a>

                </div>

                <div class="d-flex justify-content-between">

                    <a href="{{ route('create_admin.view-ine-admin',$item->id) }}">
                        <span class="badge bg-success" style="font-size: 70%;">
                            INE
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpIne->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-cd-admin',$item->id) }}">
                        <span class="badge bg-success" style="font-size: 70%;">
                            Comprobante de domicilio
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpDomicilio->count() }}
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('create_admin.view-rfc-admin',$item->id) }}" style="margin-bottom: 3rem!important;">
                        <span class="badge bg-success" style="font-size: 70%;">
                            RFC
                            @if ($item->User->id == $item->id_user)
                                {{ $item->ExpRfc->count() }}
                            @endif
                        </span>
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>
