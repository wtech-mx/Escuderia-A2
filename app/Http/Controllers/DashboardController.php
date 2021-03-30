<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;

use \App\Mail\MyTestMail;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

   public function index()
    {
        $users = User::where('id','=',auth()->user()->id)
        ->first();

        $user = DB::table('users')
            ->where('role','=', 0)
            ->get();

          if($users->role == 0){
              return view('dashboard',compact('users','user'));
          }else{
              return view('admin.dashboard',compact('users','user'));
          }
    }

       public function alerts()
    {
        //Traer nombre y foto
        $users = User::where('id','=',auth()->user()->id)
        ->first();

                if($users->role == 0){
                    die();
                    return view('layouts.app');

                }else{
                    return view('admin.layouts.alert');
                }

    }

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);

        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAA134VBmc:APA91bEgYgTRmbbCwA5i6zIL9lMBJWtm01v0_PXtEk5DYLKhpyrlaWNkXR3dy5wOiWN4iiibLt8BDic-HalgFRJ-FW7QtTjBs_jrkGx7vUpSBgZ1ekhFa7287_D0BbV5IVc64HAJSq3z';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

       dd($response);
    }
}
