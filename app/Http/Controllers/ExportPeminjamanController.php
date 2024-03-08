<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportPeminjamanController extends Controller
{
    public function export_excel()
    {
        return Excel::download(new PeminjamanExport, 'Data-Peminjaman.xlsx');
    }
}
