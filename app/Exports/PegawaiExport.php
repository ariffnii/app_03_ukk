<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PegawaiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::where('role', '<>', 'user')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Telephone',
            'Alamat',
            'Role',
            'Email',
        ];
    }
}
