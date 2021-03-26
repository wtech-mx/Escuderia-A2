<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

                  view()->composer('admin.layouts.app', function($view){
                            // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateTimeString();
                      $alert2 = Alertas::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->get();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                    //Trae la alerta Verificacion
                      $verificacion= TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                      $view->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

                  view()->composer('layouts.app', function($view2){
                      // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateTimeString();
                      $alert2 = Alertas::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->get();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                    //Trae la alerta Verificacion
                      $verificacion= TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();

                                  //Trae la alerta al controlador
                      $alert3 = Alertas::
                        where('id_user', '=', auth()->user()->id)
                        ->where('start','<=', $current)
                        ->where('estatus', '=', 0)
                        ->first();

                    //Trae la alerta Seguro Controlador
                      $seguro_alerta2 = Seguros::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Tc Controlador
                      $tc_alerta2 = TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Verificacion Controlador
                      $verificacion2 = TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();


                        if($alert3 != NULL){
                            $alert3->estatus = 1;
                             $alert3->save();
                         }

                        if($seguro_alerta2 != NULL){
                             $seguro_alerta2->estatus = 1;
                             $seguro_alerta2->save();
                         }

                        if($tc_alerta2 != NULL){
                             $tc_alerta2->estatus = 1;
                             $tc_alerta2->save();
                         }

                        if($verificacion2 != NULL){
                             $verificacion2->estatus = 1;
                             $verificacion2->save();
                         }

                      $view2->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

    }
}
