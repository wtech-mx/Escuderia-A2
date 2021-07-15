@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard-admin.css') }}" rel="stylesheet">

    <div class="row bg-image">

        <div class="col-2  mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white">
                    <a href="{{ route('index_admin.cupon') }}" style="background-color: transparent;clip-path: none">
                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-8 mt-4">
            <h5 class="text-center text-white ml-4 mr-4 ">
                <strong>Role y Permisos </strong>
            </h5>
        </div>

        <div class="col-2 mt-4">
            <div class="d-flex justify-content-start">
                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                    <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px">
                </div>
            </div>
        </div>


        <div class="content container-res-max">
            <div class="col-12 mt-5">
                <form method="POST" action="{{ route('store_role.role') }}" enctype="multipart/form-data" role="form">
                    @csrf

                    <label for="">
                        <p class="text-white"><strong>Nombre</strong></p>
                    </label>

                    <div class="input-group form-group mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-users-cog icon-tc"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del Role">
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">

                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Calendario</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="19"
                                    id="calendario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Calendario
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="20"
                                    id="calendario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Alerta
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="21"
                                    id="calendario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Alerta
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="22"
                                    id="calendario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Eliminar Alerta
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Usuarios</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle2(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="23"
                                    id="usuario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Usuario
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="24"
                                    id="usuario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Usuario
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="25"
                                    id="usuario" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Usuario
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Automovil</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle3(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="26"
                                    id="automovil" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Auto
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="27"
                                    id="automovil" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Auto
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="28"
                                    id="automovil" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Auto
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Servicios</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle4(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="29"
                                    id="servicio" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Servicios
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="30"
                                    id="servicio" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Servicios
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Seguro</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle5(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="36"
                                    id="seguro" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Seguro
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="37"
                                    id="seguro" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Seguro
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Tarjeta C.</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle6(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="31"
                                    id="tarjeta" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Tarjeta C.
                                </label>
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="32"
                                    id="tarjeta" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Edit Tarjeta C.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Expedientes F.</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle7(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="33"
                                    id="expediente" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Exp
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="34"
                                    id="expediente" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Exp
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="35"
                                    id="expediente" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Borrar Exp
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Empresas</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle8(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="38"
                                    id="empresa" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Emp
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="39"
                                    id="empresa" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Emp
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="40"
                                    id="empresa" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Emp
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Verificacion</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle9(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="41"
                                    id="verificacion" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Veri.
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="42"
                                    id="verificacion" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Veri.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Cupones</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle10(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="49"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Cupon
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="50"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Cupon
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="51"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Cupon
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="52"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Eliminar Cupon
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="53"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Asig. Usuario
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="54"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Cam. Estado
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="55"
                                    id="cupon" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Check Usuario
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Nota</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle11(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="45"
                                    id="nota" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Nota
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="46"
                                    id="nota" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Crear Nota
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="47"
                                    id="nota" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Nota
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="48"
                                    id="nota" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Eliminar Nota
                                </label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Licencia C.</strong>
                            </label>
                            <input class="form-check-input" type="checkbox" onclick="toggle12(this);" />

                            <div class="col-12 mt-2">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="43"
                                    id="licencia" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Ver Licencia
                                </label>
                            </div>

                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="44"
                                    id="licencia" />
                                <label class="form-check-label text-white" for="flexCheckDefault">
                                    Editar Licencia
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <p class="form-check-label" for="flexCheckDefault" style="color: rgb(16, 247, 16)">
                                <strong>Roles y Permisos</strong>
                            </p>

                            <input class="form-check-input" type="checkbox" name="permission[]" value="56"/>
                            <label class="form-check-label text-white" for="flexCheckDefault">
                                Crear Role
                            </label>
                        </div>
                    </div>



                <div class="row">
                    <div class="col-12 mt-5">
                        <button class="btn btn-lg btn-success btn-save-neon text-white"
                            style="margin-bottom: 15rem !important;">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
                            Guardar
                        </button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

<script>
// ================================== Primer Bloque===================================
    function toggle(source) {
        var checkboxes = document.querySelectorAll('input[id="calendario"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle2(source) {
        var checkboxes = document.querySelectorAll('input[id="usuario"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle3(source) {
        var checkboxes = document.querySelectorAll('input[id="automovil"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Segundo Bloque===================================
    function toggle4(source) {
        var checkboxes = document.querySelectorAll('input[id="servicio"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle5(source) {
        var checkboxes = document.querySelectorAll('input[id="seguro"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle6(source) {
        var checkboxes = document.querySelectorAll('input[id="tarjeta"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Tercer Bloque===================================
    function toggle7(source) {
        var checkboxes = document.querySelectorAll('input[id="expediente"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle8(source) {
        var checkboxes = document.querySelectorAll('input[id="empresa"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle9(source) {
        var checkboxes = document.querySelectorAll('input[id="verificacion"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
// ================================== Cuarto Bloque===================================
function toggle10(source) {
        var checkboxes = document.querySelectorAll('input[id="cupon"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle11(source) {
        var checkboxes = document.querySelectorAll('input[id="nota"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    function toggle12(source) {
        var checkboxes = document.querySelectorAll('input[id="licencia"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }

</script>
