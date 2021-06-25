<!-- Modal -->
<div class="modal fade" id="example{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Archivos {{ $item->UserEmpresa->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-2" style="">

                <div class="row">
                    <div class="col-12" style="margin-bottom: 3rem!important;">

                        <div class="row">

                            <div class="col-6 p-2">

                              <a href="{{ route('create_admin.view-factura-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">

                                  <div class="mr-auto p-2">Facturas</div>

                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpFactura->count() }}
                                            @endif
                                        </strong>
                                  </div>

                                </div>
                              </a>

                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-tenencia-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Tenencias</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpTenencias->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-cr-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2"> Carta R.</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpCarta->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-poliza-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Póliza</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                           @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpPoliza->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-tc-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Tarjeta C.</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpTc->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Reemp</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpReemplacamiento->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-reemplacamiento-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Verificacion</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpCertificado->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-bp-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Baja de placas</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                        @if ($item->UserEmpresa->id == $item->id_empresa)
                                            {{ $item->ExpPlacas->count() }}
                                        @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-ine-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">INE</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpIne->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-cd-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">Comprobante D.</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                            @if ($item->UserEmpresa->id == $item->id_empresa)
                                                {{ $item->ExpDomicilio->count() }}
                                            @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-6 p-2">
                              <a href="{{ route('create_admin.view-rfc-admin',$item->id) }}">
                                <div class="d-flex justify-content-between bg-dark text-white p-2" style="border-radius: 10px">
                                  <div class="mr-auto p-2">RFC</div>
                                  <div class="p-2">
                                        <strong class="text-white p-2 " style="background-color: #00d62e;border-radius: 10px">
                                        @if ($item->UserEmpresa->id == $item->id_empresa)
                                            {{ $item->ExpRfc->count() }}
                                        @endif
                                        </strong>
                                  </div>
                                </div>
                              </a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
