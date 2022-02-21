@if (Session::has('success2'))
    <script>
        Swal.fire(
            'Exito!',
            'Se ha guardado exitosamiente.',
            'success'
        )

    </script>
@endif

<form class="p-5" method="POST" action="{{ route('update_admin.verificacion', $verificacion->id) }}"
    enctype="multipart/form-data" role="form">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="col-12 mt-1">
        <div class="input-group form-group">
            <input type="hidden" class="form-control" id='id_sector' name="id_sector" value="{{ $verificacion->id_sector }}">
        </div>

        <p class="text-center text-white" style="font: normal normal bold 20px/27px Segoe UI;">
            <strong>Primer Periodo de Verificaci&oacute;n </strong>
        </p>
        @if ($verificacion->id_user == NULL)
        <p class="text-center mb-5" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$verificacion->UserEmpresa->name}} / {{$verificacion->Automovil->placas}}</strong></p>

        @else
        <p class="text-center mb-5" style="color: #00d62e; font: normal normal bold 20px/27px Segoe UI;"><strong>{{$verificacion->User->name}} / {{$verificacion->Automovil->placas}}</strong></p>
        @endif
        {{-- Datos para el calendario --}}
        <div class="input-group form-group">
            <input type="hidden" class="form-control" id='title' name="title"
                value="{{ $verificacion->Automovil->placas }} / {{ $verificacion->Automovil->submarca }}">
        </div>

        <div class="input-group form-group">
            <input type="hidden" class="form-control" id='color' name="color" value="#FF0000">
        </div>

        <input type="hidden" class="form-control" id='image' name="image"
            value="{{ asset('img/icon/color/comprobado.png') }}">
        {{-- Datos para el calendario --}}

        <input type="hidden" class="form-control" id='id_user' name="id_user" value="{{ $verificacion->id_user }}">
        <input type="hidden" class="form-control" id='id_empresa' name="id_empresa"
            value="{{ $verificacion->id_empresa }}">
        <input type="hidden" class="form-control" id='current_auto' name="current_auto"
            value="{{ $verificacion->current_auto }}">

        <label class="mt-3" for="">
            <p class="text-white"><strong>Placas</strong></p>
        </label>

        <div class="input-group col-6">
            <input type="text" class="form-control" placeholder="arf-515" id="num_placa" name="num_placa"
                value="{{ $verificacion->Automovil->placas }}" readonly>
        </div>

        <label class="mt-3" for="">
            <p class="text-white"><strong>Primer Periodo</strong></p>
        </label>

        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px">
                </span>
            </div>
            <input type="date" class="form-control" placeholder="MM/DD/YYY" style="border-radius: 0  10px 10px 0;"
                id='primer_semestre' name="primer_semestre" value="{{ $verificacion->primer_semestre }}">
        </div>

    </div>

    <div class="col-12 text-center mt-5 " style="margin-bottom: 8rem !important;">
        <button class="btn btn-lg btn-save-neon text-white">
            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px">
            Actualizar
        </button>
    </div>

</form>
