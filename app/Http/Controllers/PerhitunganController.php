<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Log;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Perhitungan
        $alternatifs = DB::table('alternatif as a')
            ->join('obat', 'a.id_obat', '=', 'obat.id_obat')
            ->join('kriteria as k', function ($join) {
                $join->on('k.kode_kriteria', '=', DB::raw('"C1"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C2"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C3"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C4"'));
            })
            ->selectRaw(
                '      
                DISTINCT a.kode_alternatif,        
                obat.nama_obat,    
                a.c1,        
                a.c2,        
                a.c3,        
                a.c4,        
                        
                -- Utility calculations        
                (a.c1 - MIN(a.c1) OVER ()) / (MAX(a.c1) OVER () - MIN(a.c1) OVER ()) AS utility_c1,        
                (a.c2 - MIN(a.c2) OVER ()) / (MAX(a.c2) OVER () - MIN(a.c2) OVER ()) AS utility_c2,        
                (a.c3 - MIN(a.c3) OVER ()) / (MAX(a.c3) OVER () - MIN(a.c3) OVER ()) AS utility_c3,        
                (MAX(a.c4) OVER () - a.c4) / (MAX(a.c4) OVER () - MIN(a.c4) OVER ()) AS utility_c4,        
                        
                -- Total utility calculation      
                (      
                    ((a.c1 - MIN(a.c1) OVER ()) / (MAX(a.c1) OVER () - MIN(a.c1) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C1")) +      
                    ((a.c2 - MIN(a.c2) OVER ()) / (MAX(a.c2) OVER () - MIN(a.c2) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C2")) +      
                    ((a.c3 - MIN(a.c3) OVER ()) / (MAX(a.c3) OVER () - MIN(a.c3) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C3")) +      
                    ((MAX(a.c4) OVER () - a.c4) / (MAX(a.c4) OVER () - MIN(a.c4) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C4"))      
                ) AS total_utility        
            '
            )
            ->groupBy('a.kode_alternatif', 'obat.nama_obat', 'a.c1', 'a.c2', 'a.c3', 'a.c4', 'k.bobot')
            ->orderByRaw('CAST(SUBSTRING(a.kode_alternatif, 2) AS UNSIGNED) ASC') // Mengurutkan berdasarkan total utility
            ->paginate(10); // Atur jumlah data per halaman sesuai kebutuhan
  
        
        // Perangkingan
        $alternatifRank = DB::table('alternatif as a')
            ->join('obat', 'a.id_obat', '=', 'obat.id_obat')
            ->join('kriteria as k', function ($join) {
                $join->on('k.kode_kriteria', '=', DB::raw('"C1"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C2"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C3"'))
                    ->orOn('k.kode_kriteria', '=', DB::raw('"C4"'));
            })
            ->selectRaw(
                '      
                DISTINCT a.kode_alternatif,        
                obat.nama_obat,    

                -- Total utility calculation      
                (      
                    ((a.c1 - MIN(a.c1) OVER ()) / (MAX(a.c1) OVER () - MIN(a.c1) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C1")) +      
                    ((a.c2 - MIN(a.c2) OVER ()) / (MAX(a.c2) OVER () - MIN(a.c2) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C2")) +      
                    ((a.c3 - MIN(a.c3) OVER ()) / (MAX(a.c3) OVER () - MIN(a.c3) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C3")) +      
                    ((MAX(a.c4) OVER () - a.c4) / (MAX(a.c4) OVER () - MIN(a.c4) OVER ()) * (SELECT k.bobot / 100 FROM kriteria k WHERE k.kode_kriteria = "C4"))      
                ) AS total_utility        
            '
            )
            ->groupBy('a.kode_alternatif', 'obat.nama_obat', 'a.c1', 'a.c2', 'a.c3', 'a.c4', 'k.bobot')
            ->orderBy('total_utility', 'desc') // Mengurutkan berdasarkan total utility
            ->paginate(10); // Atur jumlah data per halaman sesuai kebutuhan

        return view('laporan.perhitungan', compact('alternatifs', 'alternatifRank'));
    }
}