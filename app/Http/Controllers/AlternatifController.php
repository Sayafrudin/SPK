<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\ParamKadaluwarsa;
use App\Models\ParamObatKhusus;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = DB::table('alternatif')
        ->join('obat', 'alternatif.id_obat', '=', 'obat.id_obat')
        ->select('alternatif.*', 'obat.nama_obat')
        ->orderByRaw('CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED) ASC')
        ->paginate(10); // Atur jumlah data per halaman sesuai kebutuhan
        
        // $alternatifs = Alternatif::with('obat')->paginate(10); // Mengambil data alternatif dengan relasi obat

        return view('spk.alternatif', compact('alternatifs'));
    }

    public function create()
    {
        $obats = Obat::all(); // Ambil semua obat untuk dropdown
        
        // // Ambil kode alternatif terakhir
        // $lastAlternatif = Alternatif::orderBy('id_alternatif', 'desc')->first();
        // $nextCode = $lastAlternatif ? 'A' . (substr($lastAlternatif->kode_alternatif, 1) + 1) : 'A1';

        // Ambil semua kode alternatif yang ada
        $existingCodes = Alternatif::pluck('kode_alternatif')->toArray();
  
        // Mencari kode alternatif yang hilang
        $nextCode = null;
        for ($i = 1; $i <= count($existingCodes) + 1; $i++) {
            $code = 'A' . $i; // Membuat kode alternatif baru
            if (!in_array($code, $existingCodes)) {
                $nextCode = $code; // Jika kode tidak ada, gunakan kode ini
                break;
            }
        }
  
        // Jika tidak ada kode yang hilang, gunakan kode terakhir
        if (!$nextCode) {
            $lastCode = end($existingCodes);
            $nextCode = 'A' . (substr($lastCode, 1) + 1);
        }

        return view('spk.alternatif-create', compact('obats', 'nextCode'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'kode_alternatif' => 'required|string|max:100',
            'id_obat' => [
                'required',
                'exists:obat,id_obat',
                Rule::unique('alternatif')->where(function ($query) use ($request) {
                    return $query->where('kode_alternatif', '!=', $request->kode_alternatif);
                }),
            ],
            'c1' => 'required|integer',
            'c2' => 'required|integer',
            'c3' => 'required|integer',
            'c4' => 'required|integer',
        ]);

        Alternatif::create($request->all());
  
        return redirect()->route('spk.alternatif')->with('message', 'Alternatif created successfully.');
    }
  
    public function edit($id)
    {
        // Mengambil data alternatif berdasarkan ID
        $alternatif = Alternatif::findOrFail($id);
        $obats = Obat::all(); // Mengambil semua obat untuk dropdown
        return view('spk.alternatif-edit', compact('alternatif', 'obats'));
    }
  
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_alternatif' => 'required|string|max:100',
            'id_obat' => 'required|exists:obat,id_obat',
            'c1' => 'required|integer',
            'c2' => 'required|integer',
            'c3' => 'required|integer',
            'c4' => 'required|integer',
        ]);
  
        // Mengupdate data alternatif
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->update($request->all());
  
        return redirect()->route('spk.alternatif')->with('message', 'Alternatif updated successfully.');
    }
  
    public function destroy($id_alternatif)
    {
        // Menghapus data alternatif
        $alternatif = Alternatif::findOrFail($id_alternatif);
        $alternatif->delete();
  
        return redirect()->route('spk.alternatif')->with('message', 'Alternatif deleted successfully.');
    }

    public function getAlternatifData($id_obat)
    {
        $obat = Obat::findOrFail($id_obat);
  
        // Hitung C1 (Penjualan Obat Sebulan)
        $c1 = Penjualan::where('id_obat', $obat->id_obat)
            ->whereMonth('tanggal_penjualan', now()->month)
            ->sum('jumlah');
  
        // Ambil C2 (Kadaluwarsa Obat)
        $c2 = ParamKadaluwarsa::join('obat', 'parameter_kadaluwarsa.id_parameter_kadaluwarsa', '=', 'obat.id_parameter_kadaluwarsa')
            ->where('obat.id_obat', $obat->id_obat)
            ->value('bobot');
  
        // Ambil C3 (Obat Khusus)
        $c3 = ParamObatKhusus::join('obat', 'parameter_obat_khusus.id_parameter_obat_khusus', '=', 'obat.id_parameter_obat_khusus')
            ->where('obat.id_obat', $obat->id_obat)
            ->value('bobot');
  
        // Ambil C4 (Banyak Persediaan)
        $c4 = $obat->stok;
  
        return response()->json(['c1' => $c1, 'c2' => $c2, 'c3' => $c3, 'c4' => $c4]);
    }
}