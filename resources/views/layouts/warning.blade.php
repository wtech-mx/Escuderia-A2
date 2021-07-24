  <div id="wrapper" class="">
    <div id="sidebar-wrapper">
          <div class="row text-center">

              <div class="col-12 mt-5">
                  <h1 class="title-emergency">¿Que paso?</h1>
              </div>

              <div class="col-6 mt-5">
                  <a  data-toggle="collapse" href="#patrulla" role="button" aria-expanded="false" aria-controls="patrulla"  class="btn-emergency">
                    <img class="icon-btn-emergency" src="{{ asset('img/icon/black/police-car.png') }}">
                  </a>
                  <p class="text-white text-emergency">
                      Me paro uno patrulla
                  </p>
              </div>

            <div class="collapse" id="patrulla">
              <div class="card-emergency">
                  <div class="row">
                      <div class="col-12">

                            <div id="carruse-emergency" class="carousel slide" data-interval="5000" data-ride="carousel" data-touch="true">
                              <div class="arrow-conetn" style="">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="circular-arrow">
                                                      <a class="" href="#carruse-emergency" role="button" data-slide="prev">
                                                          <i class="fas fa-arrow-left icon-effect-roles-arrow"></i>
                                                       </a>
                                                    </div>
                                                    <a class="circular-arrow" href="#carruse-emergency" role="button" data-slide="next">
                                                       <i class="fas fa-arrow-right icon-effect-roles-arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                              <ol class="carousel-indicators" style="bottom: -30%;background-color: #00ff37;border-radius: 30px;">
                                <li class="li" data-target="#carruse-emergency" data-slide-to="0" class="active"></li>
                                <li class="li" data-target="#carruse-emergency" data-slide-to="1"></li>
                                <li class="li" data-target="#carruse-emergency" data-slide-to="2"></li>
                              </ol>

                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/police-car.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Me paro una patrulla
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Manten la Calma</strong>
                                    </h1>
                                    <h6 class="text-white h6-emergency">
                                        Enojarte puede empeorar las cosas
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none; left: -5%;">
                                            <li>- Dirigete al oficial con respeto</li>
                                            <li>- Quedate en el coche y baja el vidrio</li>
                                            <li>- No salgas a menos que te den una razon especifica</li>
                                            <li>- Puedes elegir no contestar preguntas</li>
                                            <li>- No te pueden revisar los interiores ni la cajuela sin una orden judicial</li>
                                       </ul>
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/police-car.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Me paro una patrulla
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Enojarte puede empeorar las cosas
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/police-car.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Me paro una patrulla
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>¿Qué pasó?</strong>
                                    </h1>
                                    <h6 class="text-white h6-emergency">
                                        El oficial debe decirte porque te detuvo, mostrarte el artículo y sancion en el
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li><a href="">Ver Reglamento</a></li>
                                            <li>Si no lo hace, pide que te explique</li>
                                            <br>
                                            <li>¿Te estan extorcionando?</li>
                                            <li>Llama a la secretaria de Seguridad Pública</li>
                                       </ul>
                                </div>
                              </div>
                            </div>

                              <a  data-toggle="collapse" href="#patrulla" role="button" aria-expanded="false" aria-controls="patrulla"  class="btn-emergency-collapese">
                                <i class="fas fa-times-circle icon-emergency-collapse"></i>
                              </a>
                      </div>
                  </div>
              </div>
            </div>

              <div class="col-6">
                  <a data-toggle="collapse" href="#auto" role="button" aria-expanded="false" aria-controls="auto"  class="btn-emergency-r">
                    <img class="icon-btn-emergency-r" src="{{ asset('img/icon/black/emergency.png') }}">
                  </a>
                  <p class="text-white text-emergency-r">
                      Mi auto no esta
              </div>

            <div class="collapse" id="auto">
              <div class="card-emergency">
                  <div class="row">
                      <div class="col-12">

                            <div id="carruse-auto" class="carousel slide" data-interval="5000" data-ride="carousel" data-touch="true">
                              <div class="arrow-conetn" style="">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="circular-arrow">
                                                      <a class="" href="#carruse-auto" role="button" data-slide="prev">
                                                          <i class="fas fa-arrow-left icon-effect-roles-arrow"></i>
                                                       </a>
                                                    </div>
                                                    <a class="circular-arrow" href="#carruse-auto" role="button" data-slide="next">
                                                       <i class="fas fa-arrow-right icon-effect-roles-arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                              <ol class="carousel-indicators" style="bottom: -30%;background-color: #00ff37;border-radius: 30px;">
                                <li class="li" data-target="#carruse-auto" data-slide-to="0" class="active"></li>
                                <li class="li" data-target="#carruse-auto" data-slide-to="1"></li>
                                <li class="li" data-target="#carruse-auto" data-slide-to="2"></li>
                              </ol>

                              <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/emergency.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Mi carro no esta
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Requisitos</strong>
                                    </h1>
                                    <h6 class="text-white h6-emergency">
                                        Debes reunir los sigueintes documentos en original y dos copias
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- Licencia de conducir vigente</li>
                                            <li>- Identificacion Oficial(INE, pasaporte, cartilla o cedula profesional)</li>
                                            <li>- Tenencias anteriores pagadas</li>
                                            <li>- Haber cubierto el pago de infracciones o multas, en caso de tener alguna</li>
                                            <li>- Tarjeta de circulacion</li>
                                       </ul>
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/emergency.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Mi carro no esta
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Fijate si estas en lugar prohibido
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/emergency.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Mi carro no esta
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Fijate si estas en lugar prohibido
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li></li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>


                              </div>
                            </div>

                              <a  data-toggle="collapse" href="#auto" role="button" aria-expanded="false" aria-controls="auto"  class="btn-emergency-collapese">
                                <i class="fas fa-times-circle icon-emergency-collapse"></i>
                              </a>
                      </div>
                  </div>
              </div>
            </div>

              <div class="col-6">
                  <a data-toggle="collapse" href="#accidente" role="button" aria-expanded="false" aria-controls="accidente"  class="btn-emergency-d">
                    <img class="icon-btn-emergency-d" src="{{ asset('img/icon/black/accident.png') }}">
                  </a>
                  <p class="text-white text-emergency-d">
                     Tuve un Accidente
                  </p>
              </div>

            <div class="collapse" id="accidente">
              <div class="card-emergency">
                  <div class="row">
                      <div class="col-12">

                            <div id="carruse-accidente" class="carousel slide" data-interval="5000" data-ride="carousel" data-touch="true">
                              <div class="arrow-conetn" style="">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="circular-arrow">
                                                      <a class="" href="#carruse-accidente" role="button" data-slide="prev">
                                                          <i class="fas fa-arrow-left icon-effect-roles-arrow"></i>
                                                       </a>
                                                    </div>
                                                    <a class="circular-arrow" href="#carruse-accidente" role="button" data-slide="next">
                                                       <i class="fas fa-arrow-right icon-effect-roles-arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                              <ol class="carousel-indicators" style="bottom: -30%;background-color: #00ff37;border-radius: 30px;">
                                <li class="li" data-target="#carruse-accidente" data-slide-to="0" class="active"></li>
                                <li class="li" data-target="#carruse-accidente" data-slide-to="1"></li>
                                <li class="li" data-target="#carruse-accidente" data-slide-to="2"></li>
                              </ol>

                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/accident.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Tuve un accidente
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Manten la Calma</strong>
                                    </h1>
                                    <h6 class="text-white h6-emergency">
                                        Checa que tú y los involucrados no estén heridos
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>¿Necesitas ayuda?</li>
                                            <li>Llama a la patrulla<a href="tel:+066"> 066</a></li>
                                            <li>Llama a la ambulancia<a href="tel:+065"> 065</a></li>
                                            <li>Tambien puede llamar al<a href="tel:+911"> 911</a></li>
                                       </ul>
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/accident.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Tuve un accidente
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Afrime
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/accident.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Tuve un accidente
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Afrime
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>
                              </div>
                            </div>

                              <a  data-toggle="collapse" href="#accidente" role="button" aria-expanded="false" aria-controls="auto"  class="btn-emergency-collapese">
                                <i class="fas fa-times-circle icon-emergency-collapse"></i>
                              </a>
                      </div>
                  </div>
              </div>
            </div>


              <div class="col-6">
                  <a data-toggle="collapse" href="#arana" role="button" aria-expanded="false" aria-controls="arana" class="btn-emergency-dr">
                    <img class="icon-btn-emergency-dr" src="{{ asset('img/icon/black/rueda.png') }}">
                  </a>
                  <p class="text-white text-emergency-dr">
                      Me pusieron la araña
                  </p>
              </div>

            <div class="collapse" id="arana">
              <div class="card-emergency">
                  <div class="row">
                      <div class="col-12">

                            <div id="carruse-arana" class="carousel slide" data-interval="5000" data-ride="carousel" data-touch="true">
                              <div class="arrow-conetn" style="">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between">
                                                    <div class="circular-arrow">
                                                      <a class="" href="#carruse-arana" role="button" data-slide="prev">
                                                          <i class="fas fa-arrow-left icon-effect-roles-arrow"></i>
                                                       </a>
                                                    </div>
                                                    <a class="circular-arrow" href="#carruse-arana" role="button" data-slide="next">
                                                       <i class="fas fa-arrow-right icon-effect-roles-arrow"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                              <ol class="carousel-indicators" style="bottom: -30%;background-color: #00ff37;border-radius: 30px;">
                                <li class="li" data-target="#carruse-arana" data-slide-to="0" class="active"></li>
                                <li class="li" data-target="#carruse-arana" data-slide-to="1"></li>
                              </ol>

                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/rueda.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Me pusieron la araña
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Busca la boleta de infraccion en tu parabrisas</strong>
                                    </h1>
                                    <h6 class="text-white h6-emergency">
                                        En ella vendra el monto de la multa y del inmovilizador. Puedes pagarla en Oxxo y 7 eleven
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- Llama a ecoParq</li>
                                            <li>- Una vez pagada la multa, habla al telefono que viene al reverso de la boleta para que te retiren la araña</li>
                                       </ul>
                                </div>

                                <div class="carousel-item ">
                                    <p class="text-center">
                                        <a href="#patrulla" class="btn-emergency-top">
                                          <img class="icon-btn-emergency-2" src="{{ asset('img/icon/black/rueda.png') }}">
                                        </a>
                                    </p>
                                    <h5 class="text-center h5-emergency">
                                        Mi carro no esta
                                    </h5>
                                    <h1 class="text-white">
                                        <strong>Proximamente</strong>
                                    </h1>
                                    {{-- <h6 class="text-white h6-emergency">
                                        Fijate si estas en lugar prohibido
                                    </h6>
                                       <ul class="text-center text-white mt-5" style="position: relative;list-style: none;left: -5%;">
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                            <li>- kiasidasdjasoñdj9asdais</li>
                                       </ul> --}}
                                </div>

                              </div>
                            </div>

                              <a  data-toggle="collapse" href="#arana" role="button" aria-expanded="false" aria-controls="auto"  class="btn-emergency-collapese">
                                <i class="fas fa-times-circle icon-emergency-collapse"></i>
                              </a>
                      </div>
                  </div>
              </div>
            </div>

          </div>
    </div>
  </div>
