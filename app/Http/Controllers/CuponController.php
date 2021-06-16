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

        $cupon = new  Cupon;
        $cupon->titulo = $request->get('titulo');
        $cupon->validez = $request->get('validez');
        $cupon->aplicacion = $request->get('aplicacion');
        $cupon->precio = $request->get('precio');

        $new_image_name = 'Cupon' . date('Ymd') . uniqid() . '.svg';
        $qrimage = public_path('qr/' . $new_image_name);
        QRCode::color(0, 249, 76)->generate('https://checkn-go.com.mx/admin/cupon/edit/', $qrimage);
        $cupon->qr = $new_image_name;

        if ($request->hasFile('img1')) {

            $path = 'cupon/';
            $file = $request->file('img1');
            $new_image_name = date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $cupon->img1 = $new_image_name;

            $filepath = public_path('/cupon/' . $cupon->img1);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        if ($request->hasFile('img2')) {

            $path = 'cupon/';
            $file = $request->file('img2');
            $new_image_name = date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $cupon->img2 = $new_image_name;

            $filepath = public_path('/cupon/' . $cupon->img2);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        $cupon->save();

        $cupon_user = new  CuponUser;
        $cupon_user->id_cupon = $cupon->id;
        $cupon_user->id_user = $request->get('id_user');
        $cupon_user->titulo = $cupon->titulo;
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
        $cupon->validez = $request->get('validez');
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

    public function update_check(Request $request, $id)
    {
        $cupon_user = CuponUser::findOrFail($request->get('id_user'));
        $cupon_user->check = 1;

        $cupon_user->save();

        Session::flash('create', 'Se ha actualizado su cupon con exito');
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
