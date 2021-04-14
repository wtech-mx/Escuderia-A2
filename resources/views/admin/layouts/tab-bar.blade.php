                        @if(Session::has('alert'))
                            <script>
                                Swal.fire({
                                  title: 'Exito!!',
                                  html:
                                    'Se ha enviado tu  <b>Alerta</b>, ' +
                                    'Exitosamente',
                                  // text: 'Se ha agragado la "MARCA" Exitosamente',
                                  imageUrl: '{{ asset('img/icon/color/alert.png') }}',
                                  background: '#fff',
                                  imageWidth: 150,
                                  imageHeight: 150,
                                  imageAlt: 'USUARIO IMG',
                                })
                            </script>
                        @endif
                <div class="row bg-blue">
                    <div class="navbar">

                        <div class="navbar__item -blue">
                            <a href="{{ route('index.dashboard') }}">
                            <span class="navbar__icon">
                                <img class="" src="{{ asset('img/icon/color/icon-home.png') }}" width="25px" >
                            </span>
                            </a>
                        </div>

                        <div class="navbar__item -orange">
                            <a href="{{ route('index_admin.automovil') }}">
                            <span class="navbar__icon">
                                 <img class="" src="{{ asset('img/icon/color/sedan.png') }}" width="25px" >
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
                            <a href="{{ route('index_admin.view-exp-fisico-admin') }}">
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
                            <a href="{{ route('index.alert') }}">
{{--                            <a type="button"  data-toggle="modal" data-target="#alert-modal">--}}
                                <span class="navbar__icon">
                                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </span>
                            </a>
                        </div>

                    </div>
                    @include('admin.layouts.modal-alert')
                    @include('admin.modal-services')
                </div>
