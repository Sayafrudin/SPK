<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = DB::table('alternatif')
        ->join('obat', 'alternatif.id_obat', '=', 'obat.id_obat')
        ->select('alternatif.*', 'obat.nama_obat')
        ->paginate(5);
        
        return view('spk.alternatif', compact('alternatifs'));
    }
}