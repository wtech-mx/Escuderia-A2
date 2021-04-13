<div class="modal fade" id="modalcr{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-cr',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalcd{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-cd',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalfactura{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-factura',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modaline{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-ine',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalbp{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-bp',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalpoliza{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-poliza',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalreemplacamiento{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-reemplacamiento',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalrfc{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-rfc',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modaltc{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-tc',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modaltenencias{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-tenencias',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="modalcertificado{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('destroy.exp-certificado',$item->id)}}">

        {{csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center p-2">¿Desea eliminar el Registro? </h3>
                            <p class="text-center">Una vez eliminado no se puede recuperar</p>

                            <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger text-white" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
