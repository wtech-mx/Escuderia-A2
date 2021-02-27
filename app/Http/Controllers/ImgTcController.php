<?php

namespace App\Http\Controllers;

use App\Models\ImgTc;
use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;
use Session;


class ImgTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImgTc  $imgTc
     * @return \Illuminate\Http\Response
     */
    public function show(ImgTc $imgTc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImgTc  $imgTc
     * @return \Illuminate\Http\Response
     */
    public function edit(ImgTc $imgTc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImgTc  $imgTc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImgTc $imgTc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImgTc  $imgTc
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImgTc $imgTc)
    {
        //
    }
}
