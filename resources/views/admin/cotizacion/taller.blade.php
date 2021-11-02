@extends('admin.layouts.app')

@section('bg-color', 'background-color: #000000;')

@section('content')
@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

        <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

        <div class="row bg-down-image-border" style=" min-height: 10vh">
                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white">
                                    <a href="{{ route('index.cotizacion') }}" style="background-color: transparent;clip-path: none">
                                        <img class="" src="{{ asset('img/icon/white/left-arrow.png') }}" width="25px" >
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-8 mt-5">
                                <h5 class="text-center text-white ml-4 mr-4 ">
                                    <strong>Orden de servicio</strong>
                                </h5>
                    </div>

                    <div class="col-2 mt-5">
                        <div class="d-flex justify-content-start">
                                <div class="text-center text-white bg-white" style="border-radius: 50px;padding: 5px">
                                  <img class="" src="{{ asset('img/icon/color/campana.png') }}" width="25px" >
                                </div>
                        </div>
                    </div>

        </div>

                <div class="row  bg-down-image-border" >
                    <div class="col-12  mt-5">

                        <form class="card-details" method="POST" action="{{route('store.cotizacion')}}" enctype="multipart/form-data" role="form">
                            @csrf

                                @if(Session::has('success'))
                                    <script>
                                        Swal.fire({
                                            title: 'Exito!!',
                                            html:
                                            'Se ha actualizado tu  <b>Tarjeta de Circulaci&oacute;n</b>, ' +
                                            'Exitosamente',
                                            // text: 'Se ha agragado la "MARCA" Exitosamente',
                                            imageUrl: '{{ asset('img/icon/color/dosier.png') }}',
                                            background: '#fff',
                                            imageWidth: 150,
                                            imageHeight: 150,
                                            imageAlt: 'USUARIO IMG',
                                        })
                                    </script>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <span id="success_result"></span>
                                        <form method="post" id="repeater_form">

                                        <hr>
                                        <div id="repeater">
                                            <div class="row">
                                                <div class="col-md-9">
                                                </div>
                                                <div class="col-md-3">
                                                <button type="button" class="btn btn-primary repeater-add-btn"> Agregar </button>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                            <div class="items" data-group="programming_languages">
                                                <div class="item-content">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <label class="form-label"></label>
                                                                    <select required data-skip-name="true" data-name="lenguaje[]" class="form-select">
                                                                    <option value="">Seleccionar habilidad del programador</option>
                                                                    <option value="PHP">PHP</option>
                                                                    <option value="Oracle">Oracle</option>
                                                                    <option value="JQuery">JQuery</option>
                                                                    <option value="Vanilla JS">Vanilla JS</option>
                                                                    <option value="AngularJS">AngularJS</option>
                                                                    <option value="CoffeeScript">CoffeeScript</option>
                                                                    <option value="Laravel">Laravel</option>
                                                                    <option value="Bootstrap 5">Bootstrap 5</option>
                                                                    </select>
                                                            </div>
                                                            <div class="col-md-3" style="margin-top:24px;" >
                                                                <button onclick="$(this).parents('.items').remove()" class="remove-btn btn btn-danger">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group" align="center">
                                    <button type="submit" name="insertar" class="btn btn-success">Registrar programador</button>
                                </div>
                        </form>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){

                    $('#repeater').createRepeater();

                    $('#repeater_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                    url:"agregar.php",
                    method:"POST",
                    data:$(this).serialize(),
                    success:function(data)
                    {
                    $('#repeater_form')[0].reset();
                    $('#repeater').createRepeater();
                    $('#success_result').html(data);
                    }
                    })
                    });

                    });

                    </script>
@endsection
