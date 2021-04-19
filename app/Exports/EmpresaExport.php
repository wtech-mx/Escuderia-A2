<?php

namespace App\Exports;

use App\Models\Empresa;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmpresaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'nombre',
            'telefono',
            'direccion',
            'referencia',
        ];
    }
    public function collection()
    {

         $empresa = DB::table('empresa')
             ->select('id', 'nombre','telefono', 'direccion', 'referencia')->get();
         return $empresa;

    }
}
