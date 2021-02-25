<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\MarcaProduct;
use Session;

class MarcaController extends Controller
{
     public function store(Request $request){
        $marca = new MarcaProduct;
        $marca->nombre = $request->get('nombre');

        $marca->save();

        Session::flash('marca', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
