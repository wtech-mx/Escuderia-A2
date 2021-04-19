<?php

namespace App\Exports;

use App\Models\TarjetaCirculacion;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TcExportEmpresa implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'id_user',
            'current_auto',
            'nombre',
            'tipo_placa',
            'lugar_expedicion',
            'fecha_emision',
            'num_placa',
            'img',
        ];
    }
    public function collection()
    {

         $tc = DB::table('tarjeta_circulacion')
             ->where('id_user', '=', NULL)
             ->select('id', 'id_user','current_auto', 'nombre', 'tipo_placa', 'lugar_expedicion', 'fecha_emision', 'num_placa', 'img')->get();
         return $tc;

    }
}
