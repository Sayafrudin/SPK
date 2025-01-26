<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        // $penjualans = DB::table('penjualan')
        // ->join('obat', 'penjualan.id_obat', '=', 'obat.id_obat')
        // ->select('penjualan.*', 'obat.nama_obat')
        // ->paginate(5);
        
        // Ambil bulan dan tahun dari request
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Mulai query
        $query = DB::table('penjualan')
            ->join('obat', 'penjualan.id_obat', '=', 'obat.id_obat')
            ->select('penjualan.*', 'obat.nama_obat');

        // Tambahkan filter jika bulan dan tahun diberikan
        if ($bulan) {
            $query->whereMonth('penjualan.tanggal_penjualan', $bulan);
        }

        if ($tahun) {
            $query->whereYear('penjualan.tanggal_penjualan', $tahun);
        }

        // Ambil data dengan paginasi
        $penjualans = $query->paginate(5);

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $obats = Obat::all();
        // $penjualans = DB::table('penjualan')->get();
        return view('penjualan.penjualan-create', compact('obats'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|integer',
            'tanggal_penjualan' => 'nullable|date'
        ]);
  
        // Ambil obat berdasarkan id_obat
        $obat = Obat::find($request->id_obat);
  
        // Cek apakah stok cukup
        if ($obat->stok < $request->jumlah) {
            return redirect()->back()->withErrors(['message' => 'Stok obat tidak cukup.']);
        }
  
        // Hitung total harga
        $total_harga = $obat->harga * $request->jumlah;
  
        // Jika tanggal_penjualan tidak diisi, gunakan tanggal sekarang
        $tanggalPenjualan = $request->tanggal_penjualan ?? now();

        // Simpan data penjualan
        Penjualan::create([
            'id_obat' => $request->id_obat,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal_penjualan' => $tanggalPenjualan,
        ]);
  
        // Kurangi stok obat
        $obat->stok -= $request->jumlah;
        $obat->save();
  
        return redirect()->route('penjualan.index')->with('message', 'Penjualan created successfully.');
    }

    public function edit($id_penjualan)
    {
        $obats = Obat::all();
        $penjualans = Penjualan::findOrFail($id_penjualan);
        
        return view('penjualan.penjualan-edit', compact('penjualans', 'obats'));
    }

    public function update(Request $request, $id_penjualan)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah' => 'required|integer|min:1',
            'tanggal_penjualan' => 'required|date',
        ]);
  
        // Ambil penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id_penjualan);
        $obat = Obat::find($penjualan->id_obat); // Obat yang sebelumnya terjual
        
        // Kembalikan stok obat yang sebelumnya
        $obat->stok += $penjualan->jumlah; // Kembalikan stok lama

        // Hitung stok yang tersedia setelah mengembalikan stok lama
        $stokTersedia = $obat->stok - ($request->jumlah); // Hitung stok setelah update

        // Cek apakah stok cukup setelah update
        if ($stokTersedia < 0) {
            // Kembalikan stok obat yang lama jika tidak cukup
            $obat->stok -= $penjualan->jumlah; // Kembalikan stok ke nilai sebelumnya
            $obat->save();
            return redirect()->back()->withErrors(['message' => 'Stok obat tidak cukup.']);
        }

        // Update data penjualan
        $penjualan->update([
            'id_obat' => $request->id_obat,
            'jumlah' => $request->jumlah,
            'total_harga' => $obat->harga * $request->jumlah,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);
  
        // Kurangi stok obat yang baru
        $obat->stok -= $request->jumlah; // Kurangi stok sesuai jumlah baru
        $obat->save();
  
        return redirect()->route('penjualan.index')->with('message', 'Penjualan updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_penjualan)
    {
        // Ambil penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id_penjualan);
        $obat = Obat::find($penjualan->id_obat);

        // Kembalikan stok obat
        $obat->stok += $penjualan->jumlah;
        $obat->save();

        // Hapus data penjualan
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('message', 'Penjualan deleted successfully.');
    }
}