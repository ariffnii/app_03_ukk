<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeminjamanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peminjaman::all();
    }

    public function headings(): array
    {
        return [
            'ID Peminjaman',
            'Judul Buku',
            'Username',
            'Tgl. Pinjam',
            'Tgl. Kembali',
            'Jumlah'
        ];
    }

    public function map($peminjaman): array
    {
        return [
            $peminjaman->id,
            $peminjaman->buku->judul,
            $peminjaman->user->name,
            $peminjaman->tgl_pinjam,
            $peminjaman->tgl_kembali,
            $peminjaman->jumlah
        ];
    }
}
