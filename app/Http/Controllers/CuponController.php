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

    public function index()
    {
        $cupon_user = CuponUser::where('id_user', '=', auth()->user()->id)->get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('cupon.index', compact('cupon_user', 'user'));
    }

    public function index_admin(Request $request)
    {
            $cupon = Cupon::get();
            $cupon_user = CuponUser::get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();


            return view('admin.cupon.index', compact('cupon', 'cupon_user', 'user'));
    }

    public function create_admin()
    {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.cupon.create', compact('user'));
    }

    public function store_admin(Request $request)
    {

        $validate = $this->validate($request, [
            'titulo' => 'required',
        ]);

        $cupon = new  Cupon;
        $cupon->titulo = $request->get('titulo');
        $cupon->color = $request->get('color');
        $cupon->estado = 0;
        $cupon->aplicacion = $request->get('aplicacion');
        $cupon->precio = $request->get('precio');
        $cupon->fecha_caducidad = $request->get('fecha_caducidad');

        $new_image_name = 'Cupon' . date('Ymd') . uniqid() . '.svg';
        $qrimage = public_path('qr/' . $new_image_name);

        QRCode::color(0, 0, 0)->generate('https://checkn-go.com.mx/admin/cupon/check/edit/' . $cupon->id, $qrimage);
        $cupon->qr = $new_image_name;

        if ($cupon->save()) {
            $latestId = Cupon::latest('id')->first()->id;
            $cupon = Cupon::findOrFail($latestId);
            $new_image_name = 'Cupon' . date('Ymd') . uniqid() . '.svg';
            $qrimage = public_path('qr/' . $new_image_name);

            QRCode::color(0, 0, 0)->generate('https://checkn-go.com.mx/admin/cupon/check/edit/' . $latestId, $qrimage);
            $cupon->qr = $new_image_name;
            $cupon->save();
        }

        Session::flash('create', 'Se ha guardado su cupon con exito');
        return redirect()->route('index_admin.cupon');
    }

    public function create_asignacion()
    {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.cupon.asignacion', compact('user'));
    }

    public function edit_asignacion($id)
    {
            $cupon = Cupon::where('id', '=',  $id)->get();
            $cupon_user = CuponUser::where('id_cupon', '=',  $id)->get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.cupon.asignacion', compact('cupon', 'cupon_user', 'user'));
    }

    public function update_asignacion(Request $request)
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

        Session::flash('asignacion', 'Se ha asignacion el cupon al usuario');
        return redirect()->back();
    }

    public function edit_admin($id)
    {
            $cupon = Cupon::where('id', '=',  $id)->get();
            $cupon_user = CuponUser::where('id_cupon', '=',  $id)->get();

            return view('admin.cupon.edit', compact('cupon', 'cupon_user'));
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
        $cupon->fecha_caducidad = $request->get('fecha_caducidad');
        $cupon->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function edit_check($id)
    {
            $cupons = Cupon::findOrFail($id);
            $cupons_user = CuponUser::where('id_cupon', '=', $id)->where('check', '=', 0)->get();

            return view('admin.cupon.check', compact('cupons', 'cupons_user'));
    }

    public function update_check(Request $request, $id)
    {
        $cupon_user = CuponUser::findOrFail($request->get('id_user'));
        $cupon_user->check = 1;

        $cupon_user->save();

        Session::flash('success', 'Se ha actualizado el estatus del usuario con exito');
        return redirect()->back();
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
