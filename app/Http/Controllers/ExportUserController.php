<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PeminjamExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportUserController extends Controller
{
    public function export_excel()
    {
        return Excel::download(new PeminjamExport, 'Data-Peminjam.xlsx');
    }
}
