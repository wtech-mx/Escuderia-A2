<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

       Auth::login($userreg = new User([
//        $userreg = new User([
         'name' => $request->get('name'),
         'email'=> $request->get('email'),
         'password' => Hash::make($request['password']),
         ]));

        $email = $request->get('email');

        $subject = 'Bienvenido : '.$email ;

        $details = array(
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'password' => $request->get('password'),
         );

//        \Mail::send('emails.register', $details, function($message) use ($email, $subject) {
//            $message->to($email)->subject($subject);
//        });

        Mail::send('emails.register', $details, function ($message) use ($details,$subject) {
            $message->to($details['email'], $details['name'], $details['password'])
                ->subject($subject)
                ->from('contacto@checkngo.com.mx', 'Registro Checkngo');
        });

         $userreg->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
