<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BerandaUserController extends Controller
{
    public function index(){
        $dbuku = Buku::all()->where('status', 'aktif');
        return view('pages.landing-page', compact('dbuku'));
    }

    public function show(){
        return view('users.dashboardUser');
    }
}
