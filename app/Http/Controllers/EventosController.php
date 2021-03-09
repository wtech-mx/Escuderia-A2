<?php

namespace App\Http\Controllers;
use DB;

use App\Models\evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alertas;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->get();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('status', '=', 0)
            ->get();

        return view('admin.alerts.view-alerts-admin',compact('alert2','user'));
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
    public function store(Request $request)
    {
        $datosEvento = request()->except(['_token','_method']);
        evento::insert($datosEvento);
        print_r($datosEvento);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //Trae datos de db to jason
        $json = $data['eventos'] = evento::all();
        $json2 = $data2['alertas'] = Alertas::all();

        //los convieerte en array
        $decode = json_decode($json);
        $decode2 = json_decode($json2);

        //Une los array en uno solo
        $resultado = array_merge ($decode, $decode2);

        //retorna a la vista sn json
        return response()->json($resultado);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEvento = request()->except(['_token','_method']);
        $respuesta = evento::where('id','=',$id)->update($datosEvento);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventos = evento::findOrFail($id);
        evento::destroy($id);
        return response()->json($id);
    }
}