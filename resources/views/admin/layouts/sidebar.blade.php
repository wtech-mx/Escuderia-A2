
    <div class="col-2 sidebar_pc" style="padding: 0px;">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 210px;height: 100%;border-radius: 0 20px 20px 0;border: solid 3px #2ce048">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">

               <li class="nav-link-sidebar">
                 <a href="{{ route('index_admin.user') }}" class="nav-link a_sidebar {{ (Request::is('admin/usuario*') ? 'active' : '') }} ">
                    <i class="fas fa-users icon_effect_res_dashboard"></i>
                  Usuarios
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="#" class="a_sidebar">
                 <i class="fas fa-cogs icon_effect_res_dashboard"></i>
                  Servicios
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="{{ route('index_admin.automovil') }}" class="nav-link a_sidebar {{ (Request::is('admin/automovil*') ? 'active' : '') }}">
                    <i class="fas fa-car icon_effect_res_dashboard"></i>
                  Vehículos
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="{{ route('index_admin.view-exp-fisico-admin') }}" class="nav-link a_sidebar {{ (Request::is('admin/exp-fisico*') ? 'active' : '') }}">
                    <i class="fas fa-folder-open icon_effect_res_dashboard"></i>
                  Exp Físico
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="{{ route('indextc_admin.tarjeta-circulacion') }}" class="nav-link a_sidebar {{ (Request::is('admin/tarjeta-circulacion*') ? 'active' : '') }}">
                    <i class="fas fa-money-check icon_effect_res_dashboard"></i>
                  T. Circulación
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="{{ route('index_admin.gasolina') }}" class="nav-link a_sidebar {{ (Request::is('admin/gasolina*') ? 'active' : '') }}">
                    <i class="fas fa-tachometer-alt icon_effect_res_dashboard"></i>
                  Gasolina
                </a>
              </li>

              <li class="nav-link-sidebar ">
                <a href="{{ route('index_admin.verificacion') }}" class="nav-link a_sidebar {{ (Request::is('admin/verificacion*') ? 'active' : '') }}">
                 <i class="fas fa-calendar-check icon_effect_res_dashboard"></i>
                  Verificación
                </a>
              </li>

              @if (auth()->user()->empresa == 0 )
                <li class="nav-link-sidebar ">
                    <a href="{{ route('index_admin.empresa') }}" class="nav-link a_sidebar {{ (Request::is('admin/empresa*') ? 'active' : '') }}">
                        <i class="fas fa-building icon_effect_res_dashboard"></i>
                    Empresas
                    </a>
                </li>
              @endif

              <li class="nav-link-sidebar ">
                <a href="{{ route('index_admin.seguros') }}" class="nav-link a_sidebar {{ (Request::is('admin/seguros*') ? 'active' : '') }}">
                    <i class="fas fa-shield-alt icon_effect_res_dashboard"></i>
                  Seguros
                </a>
              </li>

              @if (auth()->user()->empresa == 0)
                <li class="nav-link-sidebar ">
                    <a href="{{ route('index_role.role') }}" class="nav-link a_sidebar {{ (Request::is('admin/role*') ? 'active' : '') }}">
                        <i class="fas fa-users-cog icon_effect_res_dashboard"></i>
                    Roles y Permisos
                    </a>
                </li>
              @endif

              @if (auth()->user()->empresa == 0)
                <li class="nav-link-sidebar ">
                    <a href="{{ route('index_admin.licencia') }}" class="nav-link a_sidebar {{ (Request::is('admin/licencia*') ? 'active' : '') }}">
                        <i class="far fa-id-badge icon_effect_res_dashboard"></i>
                    Licencia Conducir
                    </a>
                </li>
              @endif

              @if (auth()->user()->empresa == 0)
                <li class="nav-link-sidebar ">
                    <a href="{{ route('index_admin.cupon') }}" class="nav-link a_sidebar {{ (Request::is('admin/cupon*') ? 'active' : '') }}">
                        <i class="fas fa-qrcode icon_effect_res_dashboard"></i>
                    Cupones
                    </a>
                </li>
              @endif
              <li class="nav-link-sidebar ">
                <a href="{{ route('index.notas') }}" class="nav-link a_sidebar {{ (Request::is('admin/notas*') ? 'active' : '') }}">
                    <i class="fas fa-sticky-note icon_effect_res_dashboard"></i>
                 Notas
                </a>
              </li>

              @if (auth()->user()->empresa == 0)
                <li class="nav-link-sidebar ">
                    <a href="{{ route('index.cotizacion') }}" class="nav-link a_sidebar {{ (Request::is('admin/cotizacion*') ? 'active' : '') }}">
                        <i class="fas fa-file-invoice-dollar icon_effect_res_dashboard"></i>
                    Orden de servicio
                    </a>
                </li>
              @endif

                @if (auth()->user()->empresa == 0)
                    <li class="nav-link-sidebar ">
                        <a href="{{ route('index.key') }}" class="nav-link a_sidebar {{ (Request::is('key/index*') ? 'active' : '') }}">
                            <i class="fas fa-key icon_effect_res_dashboard"></i>
                        Licencia Empresas
                        </a>
                    </li>
                @endif



            </ul>
            <hr>
          </div>

    </div>


