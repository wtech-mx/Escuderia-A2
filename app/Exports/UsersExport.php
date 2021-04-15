<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'telefono',
            'fecha_nacimiento',
            'direccion',
            'referencia',
            'genero',
            'email',
        ];
    }
    public function collection()
    {
         $users = DB::table('Users')->select('id','name', 'telefono','fecha_nacimiento','direccion', 'referencia','genero','email')->get();
         //$users = DB::table('Users')->get();
         return $users;

    }
}
