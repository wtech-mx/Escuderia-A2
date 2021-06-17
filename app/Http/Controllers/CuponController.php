<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cupon;
use App\Models\CuponUser;
use DB;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Datatables;

class CuponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }


    public function index_admin(Request $request)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {

            $cupon = Cupon::get();
            $cupon_user = CuponUser::get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();


            return view('admin.cupon.index', compact('cupon', 'cupon_user', 'user'));
        }
    }

    public function create_admin()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.cupon.create', compact('user'));
        }
    }

    public function store_admin(Request $request)
    {

        $validate = $this->validate($request, [
            'titulo' => 'required',
        ]);

        $cupon = new  Cupon;
        $cupon->titulo = $request->get('titulo');
        $cupon->color = $request->get('color');
        $cupon->aplicacion = $request->get('aplicacion');
        $cupon->precio = $request->get('precio');

        $new_image_name = 'Cupon' . date('Ymd') . uniqid() . '.svg';
        $qrimage = public_path('qr/' . $new_image_name);

        QRCode::color(0, 0, 0)->generate('https://checkn-go.com.mx/admin/cupon/check/edit/'.$cupon->id, $qrimage);
        $cupon->qr = $new_image_name;

        if ($cupon->save()){
            $latestId = Cupon::latest('id')->first()->id;
            $cupon = Cupon::findOrFail($latestId);
            $new_image_name = 'Cupon' . date('Ymd') . uniqid() . '.svg';
            $qrimage = public_path('qr/' . $new_image_name);

            QRCode::color(0, 0, 0)->generate('https://checkn-go.com.mx/admin/cupon/check/edit/'.$latestId, $qrimage);
            $cupon->qr = $new_image_name;
            $cupon->save();
        }

        $cupon_user = new  CuponUser;
        $cupon_user->id_cupon = $cupon->id;
        $cupon_user->id_user = $request->get('id_user');
        $cupon_user->titulo = $cupon->titulo;
        $cupon_user->color = $cupon->color;
        $cupon_user->descripcion = 'Hola, Tienes un cupon disponible.';
        $cupon_user->end = $request->get('end');
        $cupon_user->enviado = 0;
        $cupon_user->check = 0;
        $cupon_user->save();

        Session::flash('create', 'Se ha guardado su cupon con exito');
        return redirect()->back();
    }

    public function create_asignacion()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.cupon.asignacion', compact('user'));
        }
    }

    public function store_asignacion(Request $request)
    {
        $cupon_user = new  CuponUser;
        $cupon_user->id_cupon = $request->get('id_cupon');
        $cupon_user->id_user = $request->get('id_user');
        $cupon_user->titulo = $request->get('titulo');
        $cupon_user->descripcion = 'Hola, Tienes un cupon disponible.';
        $cupon_user->end = $request->get('end');
        $cupon_user->enviado = 0;
        $cupon_user->check = 0;
        $cupon_user->save();

        Session::flash('create', 'Se ha guardado su cupon con exito');
        return redirect()->back();
    }

    public function edit_admin($id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $cupons = CuponUser::findOrFail($id);
            $cupon = Cupon::where('id', '=',  $id)->get();
            $cupon_user = CuponUser::where('id_cupon', '=',  $id)->get();

            return view('admin.cupon.edit', compact('cupon', 'cupons', 'cupon_user'));
        }
    }

    public function changeUserStatus(Request $request)
    {
        $cupon = Cupon::find($request->id);
        $cupon->estado = $request->estado;
        $cupon->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    function update_admin(Request $request, $id)
    {
        $cupon = Cupon::findOrFail($id);
        $cupon->titulo = $request->get('titulo');
        $cupon->color = $request->get('color');
        $cupon->aplicacion = $request->get('aplicacion');
        $cupon->precio = $request->get('precio');
        $cupon->qr = $request->get('qr');
        $cupon->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function edit_check($id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $cupons = Cupon::findOrFail($id);
            $cupons_user = CuponUser::where('id_cupon', '=', $id)->get();

            return view('admin.cupon.check', compact('cupons', 'cupons_user'));
        }
    }

    public function lista_check($id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $cupon = Cupon::findOrFail($id);
            $cupons = CuponUser::where('check', '=', 1)->get();

            return view('admin.cupon.lista-check', compact('cupons', 'cupon'));
        }
    }

    public function update_check(Request $request, $id)
    {
        $cupon_user = CuponUser::findOrFail($request->get('id_user'));
        $cupon_user->check = 1;

        $cupon_user->save();

        Session::flash('create', 'Se ha actualizado su cupon con exito');
        return view('admin.cupon.lista-check');
    }

    function destroy($id)
    {

        $cupon_user = CuponUser::where('id_cupon', '=', $id);
        $cupon_user->delete();

        $cupon = Cupon::findOrFail($id);
        $cupon->delete();

        Session::flash('destroy', 'Se Elimino su cupon con exito');
        return redirect()->back();
    }
}
