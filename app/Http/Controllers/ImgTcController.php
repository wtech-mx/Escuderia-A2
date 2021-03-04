<?php

namespace App\Http\Controllers;

use App\Models\ImgTc;
use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;
use Session;


class ImgTcController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validate = $this->validate($request,[
            'img' => 'required|mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $img_tc = new ImgTc;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-tc',time().".".$file->getClientOriginalExtension());
    		$img_tc->img=time().".".$file->getClientOriginalExtension();
    	}

    	$img_tc->id_tc = $request->get('id_tc');
    	$id_tc = $img_tc->id_tc;

    	$img_tc->save();

    	$tarjeta_circulacion = TarjetaCirculacion::find($id_tc);
    	$tarjeta_circulacion->id_tc = $img_tc->id;

    	$tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.tc', compact('img_tc'));
    }

    public function store_admin(Request $request){

        $validate = $this->validate($request,[
            'img' => 'required|mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $img_tc = new ImgTc;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-tc',time().".".$file->getClientOriginalExtension());
    		$img_tc->img=time().".".$file->getClientOriginalExtension();
    	}

    	$img_tc->id_tc = $request->get('id_tc');
    	$id_tc = $img_tc->id_tc;

    	$img_tc->save();

    	$tarjeta_circulacion = TarjetaCirculacion::find($id_tc);
    	$tarjeta_circulacion->id_tc = $img_tc->id;

    	$tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('indextc_admin.tarjeta-circulacion', compact('img_tc'));
    }
}
