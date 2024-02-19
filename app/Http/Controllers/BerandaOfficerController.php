<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaOfficerController extends Controller
{
    public function index(){
        return view('officer.Beranda_index');
    }
}
