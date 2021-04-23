<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\User;
use App\Models\TarjetaCirculacion;
use App\Models\Verificacion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use OneSignal;


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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

                  view()->composer('admin.layouts.app', function($view){
                            // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateString();
                      $alert2 = Alertas::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->get();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('end','=', $current)
                        ->where('estatus', '=', 0)
                        ->first();

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

//                      if($seguro_alerta != NULL){
//                          if ($seguro_alerta->end == $current){
//                          //    Inicio Alerta
//                                $fecha = $seguro_alerta->end.' 23:10 '.'GMT-5';
//
//                                $params = [];
//                                $params['include_player_ids'] = [$seguro_alerta->device_token];
//                                $contents = [
//                                   "en" => $seguro_alerta->descripcion
//                                ];
//                                $params['contents'] = $contents;
//                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
//                                $params['send_after'] = $fecha; // Delivery time
//
//                                OneSignal::sendNotificationCustom($params);
//                          //    Fin Alerta
//                          }
//
//                             $seguro_alerta->estatus = 1;
//                             $seguro_alerta->save();
//                      }
                      $view->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

                  view()->composer('layouts.app', function($view2){
                      // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateString();
                      $alert2 = Alertas::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->get();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('id_user', '=', auth()->user()->id)
                        ->where('current_auto', '=', auth()->user()->current_auto)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('current_auto', '=', auth()->user()->current_auto)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      $user = User::
                      where('id', '=', auth()->user()->id)
                      ->first();
//                      if ($user->device_token == NULL) {
//                          $user->device_token = ;
//                      }


                    //Trae la alerta Verificacion
                      $verificacion= Verificacion::
                        where('id_user', '=', auth()->user()->id)
                        ->where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->get();
//
//                      if($seguro_alerta != NULL){
//                          if ($seguro_alerta->end == $current){
//                          //    Inicio Alerta
//                                $fecha = $seguro_alerta->end.' 23:10 '.'GMT-5';
//
//                                $params = [];
//                                $params['include_player_ids'] = [$seguro_alerta->device_token];
//                                $contents = [
//                                   "en" => $seguro_alerta->descripcion
//                                ];
//                                $params['contents'] = $contents;
//                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
//                                $params['send_after'] = $fecha; // Delivery time
//
//                                OneSignal::sendNotificationCustom($params);
//                          //    Fin Alerta
//                             $seguro_alerta->estatus = 1;
//                             $seguro_alerta->save();
//                          }
//                      }
//
//                      if($tc_alerta != NULL){
//                          if ($tc_alerta->end == $current){
//                          //    Inicio Alerta
//                                $fecha = $tc_alerta->end.' 15:10 '.'GMT-5';
//
//                                $params = [];
//                                $params['include_player_ids'] = [$tc_alerta->device_token];
//                                $contents = [
//                                   "en" => $tc_alerta->descripcion
//                                ];
//                                $params['contents'] = $contents;
//                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
//                                $params['send_after'] = $fecha; // Delivery time
//
//                                OneSignal::sendNotificationCustom($params);
//                          //    Fin Alerta
//                             $tc_alerta->estatus = 1;
//                             $tc_alerta->save();
//                          }
//                      }

                      $view2->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

    }
}
