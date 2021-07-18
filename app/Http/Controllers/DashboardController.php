<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '=', auth()->user()->id)
            ->first();

        $user = DB::table('users')
            ->where('role', '=', 0)
            ->get();

        if ($users->role == 0) {
            return view('dashboard', compact('users', 'user'));
        } else {
            return view('admin.dashboard', compact('users', 'user'));
        }
    }

    public function store(Request $request)
    {
        $users = User::where('id', '=', auth()->user()->id)->first();

        $users->device_token = $request->get('user_id');
        if ($users->device_token == NULL) {
        } else {
            $users->save();
        }

        return view('layouts.app');
    }
}
