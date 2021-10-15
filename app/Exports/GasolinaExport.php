<?php

namespace App\Exports;

use App\Models\Gasolina;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GasolinaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'id',
            'id_user',
            'id_empresa',
            'id_sector',
            'current_auto',
            'taque_inicial',
            'km_actual',
            'importe',
            'litros',
            'gasolina',
            'tipo_pago',
            'estatus',
            'km_recorridos',
            'cantidad_final',
            'consumo',
        ];
    }
    public function collection()
    {
        $gasolina = DB::table('gasolina')
            ->select('id', 'id_user', 'id_empresa', 'id_sector', 'current_auto', 'taque_inicial', 'km_actual', 'importe', 'litros', 'gasolina', 'tipo_pago', 'estatus', 'km_recorridos', 'cantidad_final', 'consumo')->get();
        return $gasolina;
    }
}
