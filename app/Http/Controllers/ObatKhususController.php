<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ObatKhusus;

class ObatKhususController extends Controller
{
    public function index()
    {
        $obatKhusus = DB::table('obat_khusus')
        ->join('obat', 'obat_khusus.id_obat', '=', 'obat.id_obat')
        ->select('obat_khusus.*', 'obat.nama_obat')
        ->paginate(5);
        
        return view('obat-khusus.index', compact('obatKhusus'));
    }
}