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
      $this->app->bind('path.public',function(){
      return realpath(base_path().'/../public_html/checkn-go.com.mx');
      });
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
                        where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->first();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Verificacion
                      $verificacion= Verificacion::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Verificacion_Segunda
                      $verificacion_segunda= VerificacionSegunda::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      if($alert2 != NULL){
                          if ($alert2->end == $current){
                          //    Inicio Alerta
                                $fecha = $alert2->end.' 12:20 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$alert2->User->device_token];
                                $contents = [
                                   "en" => $alert2->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $alert2->estatus = 1;
                             $alert2->save();
                          }
                      }

                      if($seguro_alerta != NULL){
                          if ($seguro_alerta->end == $current){
                          //    Inicio Alerta
                                $fecha = $seguro_alerta->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$seguro_alerta->User->device_token];
                                $contents = [
                                   "en" => $seguro_alerta->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $seguro_alerta->estatus = 1;
                             $seguro_alerta->save();
                          }
                      }

                      if($tc_alerta != NULL){
                          if ($tc_alerta->end == $current){
                          //    Inicio Alerta
                                $fecha = $tc_alerta->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$tc_alerta->User->device_token];
                                $contents = [
                                   "en" => $tc_alerta->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $tc_alerta->estatus = 1;
                             $tc_alerta->save();
                          }
                      }

                      if($verificacion != NULL){
                          if ($verificacion->end == $current){
                          //    Inicio Alerta
                                $fecha = $verificacion->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$verificacion->User->device_token];
                                $contents = [
                                   "en" => $verificacion->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $verificacion->estatus = 1;
                             $verificacion->save();
                          }
                      }

                      if($verificacion_segunda != NULL){
                          if ($verificacion_segunda->end == $current){
                          //    Inicio Alerta
                                $fecha = $verificacion_segunda->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$verificacion_segunda->User->device_token];
                                $contents = [
                                   "en" => $verificacion_segunda->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $verificacion_segunda->estatus = 1;
                             $verificacion_segunda->save();
                          }
                      }
                      $view->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

                  view()->composer('layouts.app', function($view2){
                      // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateString();
                      $alert2 = Alertas::
                        where('estatus', '=', 0)
                        ->where('start','<=', $current)
                        ->first();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Verificacion
                      $verificacion= Verificacion::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                    //Trae la alerta Verificacion_Segunda
                      $verificacion_segunda= VerificacionSegunda::
                        where('estatus', '=', 0)
                        ->where('end','<=', $current)
                        ->first();

                      if($alert2 != NULL){
                          if ($alert2->end == $current){
                          //    Inicio Alerta
                                $fecha = $alert2->end.' 12:20 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$alert2->User->device_token];
                                $contents = [
                                   "en" => $alert2->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $alert2->estatus = 1;
                             $alert2->save();
                          }
                      }

                      if($seguro_alerta != NULL){
                          if ($seguro_alerta->end == $current){
                          //    Inicio Alerta
                                $fecha = $seguro_alerta->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$seguro_alerta->User->device_token];
                                $contents = [
                                   "en" => $seguro_alerta->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $seguro_alerta->estatus = 1;
                             $seguro_alerta->save();
                          }
                      }

                      if($tc_alerta != NULL){
                          if ($tc_alerta->end == $current){
                          //    Inicio Alerta
                                $fecha = $tc_alerta->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$tc_alerta->User->device_token];
                                $contents = [
                                   "en" => $tc_alerta->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $tc_alerta->estatus = 1;
                             $tc_alerta->save();
                          }
                      }

                      if($verificacion != NULL){
                          if ($verificacion->end == $current){
                          //    Inicio Alerta
                                $fecha = $verificacion->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$verificacion->User->device_token];
                                $contents = [
                                   "en" => $verificacion->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $verificacion->estatus = 1;
                             $verificacion->save();
                          }
                      }

                      if($verificacion_segunda != NULL){
                          if ($verificacion_segunda->end == $current){
                          //    Inicio Alerta
                                $fecha = $verificacion_segunda->end.' 12:00 '.'GMT-5';

                                $params = [];
                                $params['include_player_ids'] = [$verificacion_segunda->User->device_token];
                                $contents = [
                                   "en" => $verificacion_segunda->descripcion
                                ];
                                $params['contents'] = $contents;
                                $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                $params['send_after'] = $fecha; // Delivery time

                                OneSignal::sendNotificationCustom($params);
                          //    Fin Alerta
                             $verificacion_segunda->estatus = 1;
                             $verificacion_segunda->save();
                          }
                      }

                      $view2->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

    }
}
