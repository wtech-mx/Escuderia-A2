                    @if(Session::has('success2'))
                        <script>
                            Swal.fire(
                                'Exito!',
                                'Se ha guardado exitosamiente.',
                                'success'
                            )
                        </script>
                    @endif

                    <form class="p-5" method="POST" action="{{route('update_periodo2.verificacion',$verificacion_segunda->id_verificacion)}}" enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="col-12 mt-1">

                            <p class="text-left text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                                <strong>Segundo Periodo de Verificacion</strong>
                            </p>
                            {{--Datos para el calendario--}}
                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='title' name="title" value="{{$verificacion->Automovil->placas}}">
                            </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='descripcion' name="descripcion" value="Le toca verificar el dia ">
                            </div>

                            <div class="input-group form-group">
                                <input type="hidden" class="form-control" id='color' name="color" value="#FF0000">
                            </div>

                            <input type="hidden" class="form-control" id='image' name="image" value="{{asset('img/icon/color/comprobado.png') }}">
                            {{--Datos para el calendario--}}

                             <label for="">
                                     <p class="text-white"><strong>Placas</strong></p>
                                 </label>

                             <div class="input-group col-6">
                                    <input type="text" class="form-control" placeholder="{{$verificacion->Automovil->placas}}" readonly>
                                </div>

                             <label for="">
                                 <p class="text-white"><strong>Primer Periodo</strong></p>
                             </label>

                             <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                    </span>
                                </div>
                                 <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='segundo_semestre' name="segundo_semestre" value="{{$verificacion_segunda->segundo_semestre}}">
                            </div>

                    </div>

                    <div class="col-12 text-center mt-5 mb-5">
                        <button class="btn btn-lg btn-save-neon text-white">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                            Actualizar
                        </button>
                    </div>
                    </form>

