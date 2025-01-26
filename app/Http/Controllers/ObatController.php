<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ParamObatKhusus;
use App\Models\ParamKadaluwarsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function create()
    {
        $parameterObatKhusus = ParamObatKhusus::all();
        $parameterKadaluwarsa = ParamKadaluwarsa::all();
        return view('obat.create', compact('parameterObatKhusus', 'parameterKadaluwarsa'));
    }

    public function ObatChart(Request $request)
    {
        $dashboard = Obat::select(DB::raw('nama_obat'), DB::raw('stok'))->pluck('stok', 'nama_obat')->toArray();

        return view('dashboard', compact('dashboard'));
    }

    public function index()
    {
        $obats = DB::table('obat')
        ->join('parameter_obat_khusus', 'obat.id_parameter_obat_khusus', '=', 'parameter_obat_khusus.id_parameter_obat_khusus')
        ->join('parameter_kadaluwarsa', 'obat.id_parameter_kadaluwarsa', '=', 'parameter_kadaluwarsa.id_parameter_kadaluwarsa') // Tambahkan join ini
        ->select('obat.*', 'parameter_obat_khusus.tipe_obat', 'parameter_kadaluwarsa.tahun_kadaluwarsa') // Ambil tahun_kadaluwarsa
        ->orderBy('obat.id_obat')
        ->paginate(5);
        
        // $obats = DB::table('obat')->paginate(5);
        return view('obat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        Log::info($request->all());

        $request->validate([
            'nama_obat' => 'required',
            'id_parameter_obat_khusus' => 'required|exists:parameter_obat_khusus,id_parameter_obat_khusus',
            'id_parameter_kadaluwarsa' => 'required|exists:parameter_kadaluwarsa,id_parameter_kadaluwarsa',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Obat::create($request->all());

        dd($request->all());

        return redirect()->route('obat.index')->with('message', 'Obat created successfully');
    }

    public function edit($id_obat)
    {
        $parameterObatKhusus = ParamObatKhusus::all();
        $parameterKadaluwarsa = ParamKadaluwarsa::all();
        $obats = Obat::findOrFail($id_obat);
        return view('obat.edit', compact('obats', 'parameterObatKhusus', 'parameterKadaluwarsa'));
    }

    public function update(Request $request, $id_obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'id_parameter_obat_khusus' => 'required|exists:parameter_obat_khusus,id_parameter_obat_khusus',
            'id_parameter_kadaluwarsa' => 'required|exists:parameter_kadaluwarsa,id_parameter_kadaluwarsa',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $obats = Obat::findOrFail($id_obat);
        $obats->update($request->all());

        return redirect()->route('obat.index')->with('message', 'Obat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_obat)
    {
        $obats = Obat::findOrFail($id_obat);
        $obats->delete();

        return redirect()->route('obat.index')->with('message', 'Obat deleted successfully');
    }
}