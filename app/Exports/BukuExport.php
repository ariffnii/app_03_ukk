<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::all();
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Penulis',
            'Penerbit',
            'Tahun Terbit',
            'deskripsi',
            'Stok',
            'Status'
        ];
    }

    public function map($buku): array
    {
        return [
            $buku->judul,
            $buku->penulis,
            $buku->penerbit,
            $buku->tahun_terbit,
            $buku->deskripsi,
            $buku->stock,
            $buku->status
        ];
    }
}
