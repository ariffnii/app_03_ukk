<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportBukuController extends Controller
{
    public function export_excel()
    {
        return Excel::download(new BukuExport, 'Data-Buku.xlsx');
    }
}
