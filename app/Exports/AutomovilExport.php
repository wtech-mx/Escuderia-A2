<?php

namespace App\Exports;

use App\Automovil;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AutomovilExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'id_user',
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
             ->where('id_empresa', '=', NULL)
             ->select('id', 'id_user','id_marca', 'submarca', 'tipo', 'subtipo', 'año', 'numero_serie', 'color', 'placas', 'kilometraje',)->get();
         return $users;

    }
}
