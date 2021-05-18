@extends('layouts.app')


<div class="row justify-content-center vh-100 align-items-center" id="contenedor"
    style="background-image: url('{{ asset('img/bg-medida.png') }}');height: 100%!important;">
    <div class="col-10 text-center">

        <div class="error-template">

            <img class="img-fluid" src="{{ asset('img/403.png') }}" width="60%">

            <h1 class="mt-3" style="color: #ffff;font-size:60px">
                Oops!
            </h1>

            <h2 class="mt-3" style="color: #00f936;font-size:30px">
                Error 403
            </h2>

            <div class="error-details" style="color: #ffff;font-size:17px">
                No tienes autorización para ingresar.
            </div>

            <div class="error-actions mt-5">
                <a onClick="history.back()" class="btn btn-lg"
                    style="border-radius: 15px; width: 100%;height: 40px;background:#00f936;color:#ffff">
                    Regresar
                </a>
            </div>
        </div>
    </div>
</div>
