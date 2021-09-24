<?php

namespace App\Http\Controllers;

use App\Models\Gasolina;

use Illuminate\Http\Request;
use DB;
use Session;

class GasolinaController extends Controller
{
    /*|--------------------------------------------------------------------------
    |Create gasolina Admin_Admin
    |--------------------------------------------------------------------------*/
    function index_admin()
    {
        if(auth()->user()->chofer == 1){
            $gasolina = Gasolina::
            where('id_user', '=', auth()->user()->id)
            ->get();
        }elseif(auth()->user()->id_sector != NULL){
            $gasolina = Gasolina::
            where('id_sector', '=', auth()->user()->id_sector)
            ->get();
        }else{
            $gasolina = Gasolina::
            where('id_empresa', '=', auth()->user()->id)
            ->get();
        }



        return view('admin.gasolina.index-gasolina', compact('gasolina'));
    }

    public function create_admin()
    {
        $automovil = DB::table('automovil')
            ->where('id_sector', '=', auth()->user()->id_sector)
            ->where('id_user', '=', auth()->user()->id)
            ->get();

        return view('admin.gasolina.create-gasolina', compact('automovil'));
    }

    public function store_admin(Request $request)
    {
        $gasolina = new Gasolina;

        $gasolina->current_auto = $request->get('current_auto');
        $gasolina->id_user =  $request->get('id_user');
        $gasolina->id_sector = auth()->user()->id_sector;
        $gasolina->id_empresa = auth()->user()->id_empresa;
        $gasolina->taque_inicial = $request->get('gaugeValue');
        $gasolina->km_actual = $request->get('km_actual');
        $gasolina->importe = $request->get('importe');
        $gasolina->litros = $request->get('litros');
        $gasolina->gasolina = $request->get('gasolina');

        $gasolina->estatus = 'Pendiente';
        $gasolina->tipo_pago = $request->get('tipo_pago');

        if ($request->file('odometro')) {

            $file = $request->file('odometro');
            $file->move(public_path() . 'gasolina/odometro/', time() . "." . $file->getClientOriginalExtension());
            $gasolina->odometro = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('gasolina/odometro/' . $gasolina->odometro);

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

        if ($request->file('ticket')) {

            $file = $request->file('ticket');
            $file->move(public_path() . 'gasolina/ticket/', time() . "." . $file->getClientOriginalExtension());
            $gasolina->ticket = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('gasolina/ticket/' . $gasolina->ticket);

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

        if(Gasolina::where('id_user', '=', auth()->user()->id)->exists()){
            $periodo = Gasolina::
                where('id_user', '=', auth()->user()->id)
                ->latest()
                ->take(1)
                ->first();

        $suma_anterior = $periodo->taque_inicial + $periodo->litros;

            $gasolina->km_recorridos = $gasolina->km_actual - $periodo->km_actual;
            $gasolina->consumo = $suma_anterior - $gasolina->taque_inicial;
        }
        $gasolina->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index_admin.gasolina');
    }

    public function edit_admin($id)
    {
        $gasolina = Gasolina::findOrFail($id);

        return view('admin.gasolina.edit-gasolina', compact('gasolina'));
    }

    public function update_admin(Request $request, $id)
    {

        $gasolina = Gasolina::findOrFail($id);

        $gasolina->estatus = $request->get('estatus');

        $gasolina->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
