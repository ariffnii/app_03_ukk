<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportPegawaiController extends Controller
{
    public function export_excel()
    {
        return Excel::download(new PegawaiExport, 'Data-Pegawai.xlsx');
    }
}
