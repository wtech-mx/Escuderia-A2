<?php

namespace App\Http\Controllers;

use App\Models\TallerCotizacion;
use App\Models\User;
use Illuminate\Http\Request;

class TallerCotizacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $cotizacion = TallerCotizacion::get();

        return view('admin.taller_cotizacion.index', compact('cotizacion'));
    }

    public function create(){
        $user = User::get();

        return view('admin.taller_cotizacion.create', compact('user'));
    }
}
