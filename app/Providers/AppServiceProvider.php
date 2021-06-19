<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\User;
use App\Models\TarjetaCirculacion;
use App\Models\Llantas;
use App\Models\Verificacion;
use App\Models\VerificacionSegunda;
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
                        where('estatus', '=', 0)
                        ->OrderBy('end', 'ASC')
                        ->first();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $seguro_last_week = Seguros::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $seguro_tomorrow = Seguros::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $tc_last_week = TarjetaCirculacion::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $tc_tomorrow = TarjetaCirculacion::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                    //Trae la alerta Verificacion
                      $verificacion= Verificacion::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_last_week= Verificacion::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_tomorrow= Verificacion::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                    //Trae la alerta Verificacion_Segunda
                      $verificacion_segunda= VerificacionSegunda::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_segunda_last_week= VerificacionSegunda::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_segunda_tomorrow= VerificacionSegunda::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();


                    //Trae la alerta Verificacion_Segunda
                      $servicios = Llantas::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $servicios_last_week = Llantas::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $servicios_tomorrow = Llantas::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                      //Alerta
                      if($alert2 != NULL){
                          if($alert2->User->device_token != NULL) {
                                  //    Inicio Alerta
                                  $fecha = $alert2->end . ' 22:00 ' . 'GMT-5';

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

                      //Seguro
                      if($seguro_alerta != NULL){
                          if($seguro_alerta->User->device_token != NULL){
                              //Dos semnanas antes
                              if($seguro_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($seguro_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 22:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$seguro_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su seguro vence dentro de dos semanas '.$seguro_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $seguro_last_week->estado_last_week = 1;
                                  $seguro_last_week->save();
                              }

                              //Un dia antes
                              if($seguro_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($seguro_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$seguro_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su seguro vence mañana de su automovil con placas: '.$seguro_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $seguro_tomorrow->estado_tomorrow = 1;
                                  $seguro_tomorrow->estado_last_week = 1;
                                  $seguro_tomorrow->save();
                              }

                              //Mismo Dia
                              if($seguro_alerta != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($seguro_alerta->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $seguro_alerta->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$seguro_alerta->User->device_token];
                                    $contents = [
                                       "en" => $seguro_alerta->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $seguro_alerta->estatus = 1;
                                 $seguro_alerta->save();
                              }
                          }else{
                               $seguro_alerta->estado_tomorrow = 1;
                               $seguro_alerta->estado_last_week = 1;
                               $seguro_alerta->estatus = 1;
                               $seguro_alerta->save();
                          }
                      }

                      //Tarjeta de Circulación
                      if($tc_alerta != NULL){
                          if($tc_alerta->User->device_token != NULL){
                              //Dos semnanas antes
                              if($tc_last_week != NULL){
                                $end_last_week = date("Y-m-d",strtotime($tc_last_week->end."- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$tc_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Tarjeta de Circulación vence dentro de dos semanas '.$tc_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $tc_last_week->estado_last_week = 1;
                                  $tc_last_week->save();
                              }

                              //Un dia antes
                              if($tc_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($tc_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$tc_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Tarjeta de Circulación vence mañana de su automovil con placas: '.$tc_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $tc_tomorrow->estado_tomorrow = 1;
                                  $tc_tomorrow->estado_last_week = 1;
                                  $tc_tomorrow->save();
                              }

                              //Mismo Dia
                              if($tc_alerta != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($tc_alerta->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $tc_alerta->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$tc_alerta->User->device_token];
                                    $contents = [
                                       "en" => $tc_alerta->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $tc_alerta->estatus = 1;
                                 $tc_alerta->save();
                              }
                          }else{
                               $tc_alerta->estado_tomorrow = 1;
                               $tc_alerta->estado_last_week = 1;
                               $tc_alerta->estatus = 1;
                               $tc_alerta->save();
                          }
                      }

                      //Verificación
                      if($verificacion != NULL){
                          if($verificacion->User->device_token != NULL) {
                              //Dos semnanas antes
                              if ($verificacion_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($verificacion_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Verificación vence dentro de dos semanas ' . $verificacion_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_last_week->estado_last_week = 1;
                                  $verificacion_last_week->save();
                              }

                              //Un dia antes
                              if ($verificacion_tomorrow != NULL){
                                  $end = date("Y-m-d", strtotime($verificacion_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Verificación vence mañana de su automovil con placas: '.$verificacion_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_tomorrow->estado_tomorrow = 1;
                                  $verificacion_tomorrow->estado_last_week = 1;
                                  $verificacion_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($verificacion != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($verificacion->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $verificacion->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$verificacion->User->device_token];
                                    $contents = [
                                       "en" => 'Le toca verificar el dia de hoy '.$verificacion->end
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $verificacion->estatus = 1;
                                 $verificacion->estado_tomorrow = 1;
                                 $verificacion->estado_last_week = 1;
                                 $verificacion->save();
                              }
                          }else{
                               $verificacion->estado_tomorrow = 1;
                               $verificacion->estado_last_week = 1;
                               $verificacion->estatus = 1;
                               $verificacion->save();
                          }
                      }

                      //Verificación Segunda
                      if($verificacion_segunda != NULL){
                          if($verificacion_segunda->User->device_token != NULL){
                              //Dos semnanas antes
                              if ($verificacion_segunda_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($verificacion_segunda_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_segunda_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Verificación vence dentro de dos semanas '.$verificacion_segunda_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_segunda_last_week->estado_last_week = 1;
                                  $verificacion_segunda_last_week->save();
                              }

                              //Un dia antes
                              if ($verificacion_segunda_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($verificacion_segunda_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_segunda_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Verificación vence mañana de su automovil con placas: '.$verificacion_segunda_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_segunda_tomorrow->estado_tomorrow = 1;
                                  $verificacion_segunda_tomorrow->estado_last_week = 1;
                                  $verificacion_segunda_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($verificacion_segunda != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($verificacion_segunda->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $verificacion_segunda->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$verificacion_segunda->User->device_token];
                                    $contents = [
                                       "en" => $verificacion_segunda->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $verificacion_segunda->estatus = 1;
                                 $verificacion_segunda->save();
                              }
                          }else{
                               $verificacion_segunda->estado_tomorrow = 1;
                               $verificacion_segunda->estado_last_week = 1;
                               $verificacion_segunda->estatus = 1;
                               $verificacion_segunda->save();
                          }
                      }

                      //Servicios
                      if($servicios != NULL){
                          if($servicios->User->device_token != NULL){
                              //Dos semnanas antes
                              if ($servicios_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($servicios_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$servicios_last_week->User->device_token];
                                  $contents = [
                                      "en" => 'Dentro de dos semanas '.$servicios_last_week->descripcion
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $servicios_last_week->estado_last_week = 1;
                                  $servicios_last_week->save();
                              }

                              //Un dia antes
                              if ($servicios_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($servicios_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$servicios_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Mañana '.$servicios_tomorrow->descripcion
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $servicios_tomorrow->estado_tomorrow = 1;
                                  $servicios_tomorrow->estado_last_week = 1;
                                  $servicios_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($servicios != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($servicios->end . "- 1 days"));
                              }
                              if ($end_tomorrow== $current){
                                    $fecha = $servicios->end.' 20:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$servicios->User->device_token];
                                    $contents = [
                                       "en" => $servicios->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $servicios->estatus = 1;
                                 $servicios->save();
                              }
                          }else{
                               $servicios->estado_tomorrow = 1;
                               $servicios->estado_last_week = 1;
                               $servicios->estatus = 1;
                               $servicios->save();
                          }
                      }
                      $view->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

                  view()->composer('layouts.app', function($view2){
                      // obtener la hora actual  - 2015-12-19 10:10:54
                      $current = Carbon::now()->toDateString();
                      $alert2 = Alertas::
                        where('estatus', '=', 0)
                        ->OrderBy('end', 'ASC')
                        ->first();

                      //Trae la alerta Seguro
                      $seguro_alerta = Seguros::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $seguro_last_week = Seguros::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $seguro_tomorrow = Seguros::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                      //Trae la alerta Tc
                      $tc_alerta = TarjetaCirculacion::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $tc_last_week = TarjetaCirculacion::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $tc_tomorrow = TarjetaCirculacion::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                    //Trae la alerta Verificacion
                      $verificacion= Verificacion::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_last_week= Verificacion::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_tomorrow= Verificacion::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                    //Trae la alerta Verificacion_Segunda
                      $verificacion_segunda= VerificacionSegunda::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_segunda_last_week= VerificacionSegunda::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $verificacion_segunda_tomorrow= VerificacionSegunda::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();


                    //Trae la alerta Verificacion_Segunda
                      $servicios = Llantas::where('estatus', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $servicios_last_week = Llantas::where('estado_last_week', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();
                      $servicios_tomorrow = Llantas::where('estado_tomorrow', '=', 0)->where('check', '=', 0)->OrderBy('end', 'ASC')->first();

                      //Alerta
                      if($alert2 != NULL){
                          if($alert2->User->device_token != NULL) {
                                  //    Inicio Alerta
                                  $fecha = $alert2->end . ' 22:00 ' . 'GMT-5';

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

                      //Seguro
                      if($seguro_alerta != NULL){
                          if($seguro_alerta->User->device_token != NULL){
                              //Dos semnanas antes
                              if($seguro_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($seguro_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 22:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$seguro_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su seguro vence dentro de dos semanas '.$seguro_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $seguro_last_week->estado_last_week = 1;
                                  $seguro_last_week->save();
                              }

                              //Un dia antes
                              if($seguro_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($seguro_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$seguro_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su seguro vence mañana de su automovil con placas: '.$seguro_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $seguro_tomorrow->estado_tomorrow = 1;
                                  $seguro_tomorrow->estado_last_week = 1;
                                  $seguro_tomorrow->save();
                              }

                              //Mismo Dia
                              if($seguro_alerta != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($seguro_alerta->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $seguro_alerta->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$seguro_alerta->User->device_token];
                                    $contents = [
                                       "en" => $seguro_alerta->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $seguro_alerta->estatus = 1;
                                 $seguro_alerta->save();
                              }
                          }else{
                               $seguro_alerta->estado_tomorrow = 1;
                               $seguro_alerta->estado_last_week = 1;
                               $seguro_alerta->estatus = 1;
                               $seguro_alerta->save();
                          }
                      }

                      //Tarjeta de Circulación
                      if($tc_alerta != NULL){
                          if($tc_alerta->User->device_token != NULL){
                              //Dos semnanas antes
                              if($tc_last_week != NULL){
                                $end_last_week = date("Y-m-d",strtotime($tc_last_week->end."- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$tc_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Tarjeta de Circulación vence dentro de dos semanas '.$tc_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $tc_last_week->estado_last_week = 1;
                                  $tc_last_week->save();
                              }

                              //Un dia antes
                              if($tc_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($tc_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$tc_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Tarjeta de Circulación vence mañana de su automovil con placas: '.$tc_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $tc_tomorrow->estado_tomorrow = 1;
                                  $tc_tomorrow->estado_last_week = 1;
                                  $tc_tomorrow->save();
                              }

                              //Mismo Dia
                              if($tc_alerta != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($tc_alerta->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $tc_alerta->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$tc_alerta->User->device_token];
                                    $contents = [
                                       "en" => $tc_alerta->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $tc_alerta->estatus = 1;
                                 $tc_alerta->save();
                              }
                          }else{
                               $tc_alerta->estado_tomorrow = 1;
                               $tc_alerta->estado_last_week = 1;
                               $tc_alerta->estatus = 1;
                               $tc_alerta->save();
                          }
                      }

                      //Verificación
                      if($verificacion != NULL){
                          if($verificacion->User->device_token != NULL) {
                              //Dos semnanas antes
                              if ($verificacion_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($verificacion_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Verificación vence dentro de dos semanas ' . $verificacion_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_last_week->estado_last_week = 1;
                                  $verificacion_last_week->save();
                              }

                              //Un dia antes
                              if ($verificacion_tomorrow != NULL){
                                  $end = date("Y-m-d", strtotime($verificacion_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Verificación vence mañana de su automovil con placas: '.$verificacion_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_tomorrow->estado_tomorrow = 1;
                                  $verificacion_tomorrow->estado_last_week = 1;
                                  $verificacion_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($verificacion != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($verificacion->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $verificacion->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$verificacion->User->device_token];
                                    $contents = [
                                       "en" => 'Le toca verificar el dia de hoy '.$verificacion->end
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $verificacion->estatus = 1;
                                 $verificacion->estado_tomorrow = 1;
                                 $verificacion->estado_last_week = 1;
                                 $verificacion->save();
                              }
                          }else{
                               $verificacion->estado_tomorrow = 1;
                               $verificacion->estado_last_week = 1;
                               $verificacion->estatus = 1;
                               $verificacion->save();
                          }
                      }

                      //Verificación Segunda
                      if($verificacion_segunda != NULL){
                          if($verificacion_segunda->User->device_token != NULL){
                              //Dos semnanas antes
                              if ($verificacion_segunda_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($verificacion_segunda_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_segunda_last_week->User->device_token];
                                  $contents = [
                                      "en" => '¡Cuidado! Su Verificación vence dentro de dos semanas '.$verificacion_segunda_last_week->end
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_segunda_last_week->estado_last_week = 1;
                                  $verificacion_segunda_last_week->save();
                              }

                              //Un dia antes
                              if ($verificacion_segunda_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($verificacion_segunda_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$verificacion_segunda_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Su Verificación vence mañana de su automovil con placas: '.$verificacion_segunda_tomorrow->Automovil->placas
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $verificacion_segunda_tomorrow->estado_tomorrow = 1;
                                  $verificacion_segunda_tomorrow->estado_last_week = 1;
                                  $verificacion_segunda_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($verificacion_segunda != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($verificacion_segunda->end . "- 1 days"));
                              }
                              if ($end_tomorrow == $current){
                                    $fecha = $verificacion_segunda->end.' 09:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$verificacion_segunda->User->device_token];
                                    $contents = [
                                       "en" => $verificacion_segunda->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $verificacion_segunda->estatus = 1;
                                 $verificacion_segunda->save();
                              }
                          }else{
                               $verificacion_segunda->estado_tomorrow = 1;
                               $verificacion_segunda->estado_last_week = 1;
                               $verificacion_segunda->estatus = 1;
                               $verificacion_segunda->save();
                          }
                      }

                      //Servicios
                      if($servicios != NULL){
                          if($servicios->User->device_token != NULL){
                              //Dos semnanas antes
                              if ($servicios_last_week != NULL) {
                                  $end_last_week = date("Y-m-d", strtotime($servicios_last_week->end . "- 2 week"));
                              }
                              if ($end_last_week == $current) {

                                  $fecha = $end_last_week . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$servicios_last_week->User->device_token];
                                  $contents = [
                                      "en" => 'Dentro de dos semanas '.$servicios_last_week->descripcion
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $servicios_last_week->estado_last_week = 1;
                                  $servicios_last_week->save();
                              }

                              //Un dia antes
                              if ($servicios_tomorrow != NULL) {
                                  $end = date("Y-m-d", strtotime($servicios_tomorrow->end . "- 2 days"));
                              }
                              if ($end == $current) {

                                  $fecha = $end . ' 09:00 ' . 'GMT-5';

                                  $params = [];
                                  $params['include_player_ids'] = [$servicios_tomorrow->User->device_token];
                                  $contents = [
                                      "en" => 'Mañana '.$servicios_tomorrow->descripcion
                                  ];
                                  $params['contents'] = $contents;
                                  $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                  $params['send_after'] = $fecha; // Delivery time

                                  OneSignal::sendNotificationCustom($params);

                                  $servicios_tomorrow->estado_tomorrow = 1;
                                  $servicios_tomorrow->estado_last_week = 1;
                                  $servicios_tomorrow->save();
                              }

                              //Mismo Dia
                              if ($servicios != NULL) {
                                  $end_tomorrow = date("Y-m-d", strtotime($servicios->end . "- 1 days"));
                              }
                              if ($end_tomorrow== $current){
                                    $fecha = $servicios->end.' 20:00 '.'GMT-5';

                                    $params = [];
                                    $params['include_player_ids'] = [$servicios->User->device_token];
                                    $contents = [
                                       "en" => $servicios->descripcion
                                    ];
                                    $params['contents'] = $contents;
                                    $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
                                    $params['send_after'] = $fecha; // Delivery time

                                    OneSignal::sendNotificationCustom($params);
                                 $servicios->estatus = 1;
                                 $servicios->save();
                              }
                          }else{
                               $verificacion_segunda->estado_tomorrow = 1;
                               $verificacion_segunda->estado_last_week = 1;
                               $verificacion_segunda->estatus = 1;
                               $verificacion_segunda->save();
                          }
                      }

                      $view2->with(['alert2'=> $alert2, 'seguro_alerta'=> $seguro_alerta, 'tc_alerta'=> $tc_alerta, 'verificacion'=> $verificacion]);
                  });

    }
}
