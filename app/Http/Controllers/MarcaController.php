<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
     public function store(Request $request){
        $marca = new Marca;
        $marca->nombre = $request->get('nombre');

        $marca->save();
        return redirect()->back();
    }
}
