                          <!-- Modal View -->
                            <div class="modal fade" id="modal-doc-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-doc-{{$item->id}}" aria-hidden="true">
                              <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">

                                  <div class="modal-body">
                                      <div class="row justify-content-center">
                                          <div class="col-12 text-center mb-3">
                                              <h5 class="modal-title"><strong>{{$item->titulo}}</strong></h5>
                                          </div>
                                      </div>
                                      <div class="row justify-content-center">
                                          <div class="d-flex align-items-center">
                                              <div class="col-11">
                                                  <p class="text-center">
                                                    @if($texto == 'pdf')
                                                        <iframe width="140" height="140" src="{{asset($ruta. '/' . $item->img)}}" type="application/pdf"></iframe>
                                                      @else
                                                        <img class="" src="{{asset($ruta. '/' . $item->img)}}" style="height: 300px!important;">
                                                      @endif
                                                  </p>
                                              </div>
                                              <div class="col-1">
                                                  @if (auth()->user()->role == 0)
                                                  <a  class="btn btn-danger text-white p-2 mt-5 mb-5" data-toggle="modal" data-target="#modal{{$item->id}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                  </a>
                                                  @else
                                                    @can('Borrar Exp')
                                                    <a  class="btn btn-danger text-white p-2 mt-5 mb-5" data-toggle="modal" data-target="#modal{{$item->id}}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    @endcan
                                                  @endif

                                                    <a  class="btn btn-secondary p-2" data-dismiss="modal">
                                                        <i class="fa fa-window-close" aria-hidden="true"></i>
                                                    </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                </div>
                              </div>
                            </div>

