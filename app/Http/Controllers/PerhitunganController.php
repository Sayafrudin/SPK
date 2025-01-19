<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        return view('laporan.perhitungan');
    }
}