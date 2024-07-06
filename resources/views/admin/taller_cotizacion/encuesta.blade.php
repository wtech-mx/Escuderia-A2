@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')

@section('css')
    <link href="{{ asset('css/btn-lateral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

            <div class="row bg-down-image-border"   style=" min-height: 10vh">
                <div class="col-12 mt-5 mb-5"  >
                    <div class="text-center text-white">
                        <h1>Encuesta de satisfacción</h1>
                    </div>
                </div>

                <form method="POST" action="{{ route('update_encuesta.cotizacion_taller', $encuesta->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h5 class="text-left text-white">1) ¿Se soluciono el problema?</h5>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_1 == 'No')
                                    <input class="form-check-input" type="radio" name="pregunta_1" id="pregunta_1_no" value="No" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_1" id="pregunta_1_no" value="No">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_no">
                                    No
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;">
                                @if($encuesta->pregunta_1 == 'Si')
                                    <input class="form-check-input" type="radio" name="pregunta_1" id="pregunta_1_si" value="Si" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_1" id="pregunta_1_si" value="Si">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Si
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-5">
                            <h5 class="text-left text-white">2) ¿Te explicaron el problema?</h5>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_2 == 'No')
                                    <input class="form-check-input" type="radio" name="pregunta_2" id="pregunta_2_no" value="No" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_2" id="pregunta_2_no" value="No">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_no">
                                    No
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;">
                                @if($encuesta->pregunta_2 == 'Si')
                                    <input class="form-check-input" type="radio" name="pregunta_2" id="pregunta_2_si" value="Si" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_2" id="pregunta_2_si" value="Si">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Si
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-5">
                            <h5 class="text-left text-white">3) Como calificarias el servicio</h5>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_3 == 'Malo')
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_malo" value="Malo" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_malo" value="Malo">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_no">
                                    Malo
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_3 == 'Regular')
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_regular" value="Regular" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_regular" value="Regular">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Regular
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;">
                                @if($encuesta->pregunta_3 == 'Bueno')
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_bueno" value="Bueno" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_3" id="pregunta_3_bueno" value="Bueno">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Bueno
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-5">
                            <h5 class="text-left text-white">4) Como calificarias la atención</h5>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_4 == 'Malo')
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_malo" value="Malo" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_malo" value="Malo">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_no">
                                    Malo
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                @if($encuesta->pregunta_4 == 'Regular')
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_regular" value="Regular" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_regular" value="Regular">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Regular
                                </label>
                            </div>

                            <div class="form-check text-white" style="display: inline-block;">
                                @if($encuesta->pregunta_4 == 'Bueno')
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_bueno" value="Bueno" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="pregunta_4" id="pregunta_4_bueno" value="Bueno">
                                @endif
                                <label class="form-check-label" for="dentro_puerto_si">
                                    Bueno
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-5">
                            <h5 class="text-left text-white">5) Deja un comentario</h5>

                            <div class="form-check text-white" style="display: inline-block;margin-right:3rem;">
                                <textarea name="pregunta_5" id="pregunta_5" cols="40" rows="3"> {{$encuesta->pregunta_5}} </textarea>
                            </div>
                        </div>

                        @if ($encuesta->pregunta_1 == NULL)
                            <p class="text-center">
                                <button class="btn btn-sm btn-save text-white">
                                    <img class="d-inline" src="{{ asset('img/icon/white/save-file-option (1).png') }}" alt="Icon documento" width="30px">
                                    Guardar
                                </button>
                            </p>
                        @endif

                    </div>
                </form>
            </div>


  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-2">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Power By <script>
              document.write(new Date().getFullYear())
            </script> WebTech
          </p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>
