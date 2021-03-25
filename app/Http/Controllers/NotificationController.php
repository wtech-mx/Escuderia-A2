<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){

        return view("firebase");

    }

    public function sendNotification(){
        $token = "cNLVc4meXxg:APA91bGxwue9rhz_fM1iJzqS8i5cnLvDmG6OfHPpbueJYIKkw3Bqtc5np4ShMAO1955oxeBtWpYOgMdFTN8EKLb7Ze5ipVhVLiQXValbLCK_iSOXdC0ORMmNbZ7Z3szxvDizCL-QEPHS";
                $from = "AAAA134VBmc:APA91bEgYgTRmbbCwA5i6zIL9lMBJWtm01v0_PXtEk5DYLKhpyrlaWNkXR3dy5wOiWN4iiibLt8BDic-HalgFRJ-FW7QtTjBs_jrkGx7vUpSBgZ1ekhFa7287_D0BbV5IVc64HAJSq3z";
                $msg = array
                      (
                        'body'  => "Testing Testing",
                        'title' => "Hi, From Raj",
                        'receiver' => 'erw',
                        'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                        'sound' => 'mySound'/*Default sound*/
                      );

                $fields = array
                        (
                            'to'        => $token,
                            'notification'  => $msg
                        );

                $headers = array
                        (
                            'Authorization: key=' . $from,
                            'Content-Type: application/json'
                        );
                //#Send Reponse To FireBase Server
                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                dd($result);
                curl_close( $ch );
    }
}
