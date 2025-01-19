<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = DB::table('penjualan')
        ->join('obat', 'penjualan.id_obat', '=', 'obat.id_obat')
        ->select('penjualan.*', 'obat.nama_obat')
        ->paginate(5);
  
        return view('penjualan.index', compact('penjualans'));
    }
}