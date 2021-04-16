<?php

namespace App\Exports;

use App\Automovil;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AutomovilExportEmpresa implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'id_empresa',
            'id_marca',
            'submarca',
            'tipo',
            'subtipo',
            'año',
            'numero_serie',
            'color',
            'placas',
            'kilometraje',
        ];
    }
    public function collection()
    {

         $users = DB::table('automovil')
             ->where('id_user', '=', NULL)
             ->select('id', 'id_empresa','id_marca', 'submarca', 'tipo', 'subtipo', 'año', 'numero_serie', 'color', 'placas', 'kilometraje')->get();
         return $users;

    }
}
