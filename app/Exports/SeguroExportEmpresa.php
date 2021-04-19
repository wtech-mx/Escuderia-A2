<?php

namespace App\Exports;

use App\Models\Seguros;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SeguroExportEmpresa implements FromCollection,WithHeadings
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
            'seguro',
            'fecha_expedicion',
            'tipo_cobertura',
            'costo',
            'costo_anual',
        ];
    }
    public function collection()
    {

         $seguros = DB::table('seguros')
             ->where('id_user', '=', NULL)
             ->select('id', 'id_empresa','current_auto', 'seguro', 'fecha_expedicion', 'tipo_cobertura', 'costo', 'costo_anual')->get();
         return $seguros;

    }
}
