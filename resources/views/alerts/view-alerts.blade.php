@extends('layouts.app')

@section('content')

                <div class="row bg-blue" style="background: #050F55 0% 0% no-repeat padding-box;">

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white">
                                        <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                            <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                        </a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-8  mt-4">
                                    <h5 class="text-center text-white ml-4 mr-4 ">
                                        <strong>Alertas y Calendario</strong>
                                    </h5>
                        </div>

                        <div class="col-2  mt-4">
                            <div class="d-flex justify-content-start">
                                    <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                      <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                    </div>
                            </div>
                        </div>


                        <div class="col-12">

                            <table class="table text-white mt-5">

                              <thead>
                                <tr>
                                  <th scope="col"></th>
                                  <th scope="col">Servicio</th>
                                  <th scope="col">Km</th>
                                  <th scope="col">Fecha</th>
                                  <th scope="col">cambio</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                  <td>@mdo</td>
                                </tr>
                              </tbody>

                            </table>

                        </div>

     <script>
        Push.create("Hola Alejandro estas es una Alerta!", {
            body: "Asi se veran'?",
            icon: '{{ asset('/icon-512x512.ico') }}',
            timeout: 6000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
	</script>


                </div>



@endsection
