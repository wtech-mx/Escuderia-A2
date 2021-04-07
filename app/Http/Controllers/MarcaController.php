<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\MarcaProduct;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;

class MarcaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

     public function store(Request $request){
        $marca = new MarcaProduct;
        $marca->nombre = $request->get('nombre');

        $marca->save();

        Session::flash('marca', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
