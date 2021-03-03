
                <div class="row bg-blue">
                    <div class="navbar">

                        <div class="navbar__item -blue">
                            <a href="{{ route('admin-view-dashboard') }}">
                            <span class="navbar__icon">
                                <img class="" src="{{ asset('img/icon/color/icon-home.png') }}" width="25px" >
                            </span>
                            </a>
                        </div>

                        <div class="navbar__item -orange">
                            <a href="{{ route('index_admin.automovil') }}">
                            <span class="navbar__icon">
                                 <img class="" src="{{ asset('img/icon/color/rueda.png') }}" width="25px" >
                            </span>
                            </a>
                        </div>

                            <div class="navbar__item -navy-blue">
                                <a data-toggle="modal" data-target="#Servicios">
                                <span class="navbar__icon">
                                      <img class="" src="{{ asset('img/icon/color/add.png') }}" width="25px" >
                                </span>
                                </a>
                            </div>

                        <div class="navbar__item -yellow">
                            <a href="{{ route('indextc_admin.tarjeta-circulacion') }}">
                            <span class="navbar__icon">
                                 <img class="" src="{{ asset('img/icon/color/document.png') }}" width="25px" >
                            </span>
                            </a>
                        </div>

                        <div class="navbar__item -purple">
                            <a href="{{ route('index_admin.user') }}">
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/user.png') }}" width="25px" >
                                </span>
                            </a>
                        </div>

                        <div class="navbar__item -camel">
                            <a href="{{ route('view-alerts') }}">
                            <span class="navbar__icon">
                                <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                            </span>
                            </a>
                        </div>

                    </div>
                    @include('admin.modal-services')
                </div>
