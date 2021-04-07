                <div class="row bg-img-log" style="z-index:1000;background-color: #29df50">

                    <div class="col-2 ">

                        <div class="d-flex justify-content-start">
                               <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                   <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="rounded-circle" src="{{ asset('img-perfil/'.$users->img) }}" width="40px" >
                                   </div>
                               </a>

                                <div class="row">
                                  <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                      <div class="card card-body">
                                          <a class="text-dark" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                              <img class="rounded-circle" src="{{ asset('img/icon/black/exit.png') }}" width="15" >
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </div>

                    </div>

                    <div class="col-8">
                        <h5 class="text-center text-white ml-4 mr-4 ">
                            <strong>Hola: {{$users->name}}</strong> <br> <br>
                        </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                            <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"  class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="30px" >
                            </button>
                        </div>
                    </div>

                </div>
