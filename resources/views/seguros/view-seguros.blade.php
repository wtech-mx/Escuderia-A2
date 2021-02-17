@extends('layouts.app')

@section('content')

                <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
                <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

                <div class="row bg-profile" style="z-index: 100000">

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="javascript:history.back()" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Seguro</strong>
                                </h5>
                    </div>

                    <div class="col-2">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

                    <div class="col-12 p-3">
                        <p class="text-center">
                            <img class="" src="{{ asset('img/icon/color/logo-gnp.png') }}" width="150px" >
                        </p>
                    </div>

                </div>

                <div class="row bg-down-blue-border" style="background: #050F55 0% 0% no-repeat padding-box;">
                    <div class="col-12 mt-5">

                            <p class="text-left text-white" style="font: normal normal bold 20px/27px Segoe UI;">
                                <strong>Detalles de Seguros</strong>
                            </p>

                             <label for="">
                                 <p class="text-white"><strong>Seguro</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}" width="25px" >
                                    </span>
                                </div>

                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>aba</option>
                                  <option>afirme</option>
                                  <option>aig</option>
                                  <option>ana</option>
                                  <option>atlas</option>
                                  <option>axa</option>
                                  <option>banorte</option>
                                  <option>general</option>
                                  <option>sura</option>
                                  <option>vexmas</option>
                                  <option>gnp</option>
                                  <option>hdi</option>
                                  <option>inbursa</option>
                                  <option>latino</option>
                                  <option>mapfre</option>
                                  <option>qualitas</option>
                                  <option>potosi</option>
                                  <option>miituo</option>
                                  <option>zurich</option>

                                </select>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de Expiracion</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/calendario (1).png') }}" width="25px" >
                                    </span>
                                </div>
                                 <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Fecha de Vencimiento</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                         <img class="" src="{{ asset('img/icon/white/calendario (5).png') }}" width="25px" >
                                    </span>
                                </div>
                                 <input type="date" class="form-control" placeholder="MM/DD/YYY"  style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Tipo Cobertura</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" type="date" src="{{ asset('img/icon/white/seguro (1).png') }}" width="25px" >
                                    </span>
                                </div>

                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Amplia</option>
                                  <option>Limitada</option>
                                </select>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Costo</strong></p>
                             </label>

                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" src="{{ asset('img/icon/white/bolsa-de-dinero (1).png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Direccion" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                             <label for="">
                                 <p class="text-white"><strong>Costo anual</strong></p>
                             </label>


                            <div class="input-group form-group">
                                <div class="input-group-prepend " >
                                    <span class="input-group-text" >
                                         <img class="" src="{{ asset('img/icon/white/presupuesto (1).png') }}" width="25px" >
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="$0000" style="border-radius: 0  10px 10px 0;" id='datetimepicker1'>
                            </div>

                    </div>

                    <div class="col-12 text-center mt-5 mb-5">

                        <button class="btn btn-lg btn-success btn-save ">
                            <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                            Actualizar
                        </button>

                    </div>

                </div>


@endsection
