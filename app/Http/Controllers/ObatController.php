<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ParamObatKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function create()
    {
        $parameterObatKhusus = DB::table('parameter_obat_khusus')->get();
        return view('obat.create', compact('parameterObatKhusus'));
    }

    public function ObatChart(Request $request)
    {
        $dashboard = Obat::select(DB::raw('nama_obat'), DB::raw('stok'))->pluck('stok', 'nama_obat')->toArray();

        return view('dashboard', compact('dashboard'));
    }

    public function index()
    {
        $obats = DB::table('obat')->join('parameter_obat_khusus', 'obat.id_parameter_obat_khusus', '=', 'parameter_obat_khusus.id_parameter_obat_khusus')->select('obat.*', 'parameter_obat_khusus.tipe_obat')->orderBy('obat.id_obat')->paginate(5);

        // $obats = DB::table('obat')->paginate(5);
        return view('obat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'id_parameter_obat_khusus' => 'required|in:1,2',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('message', 'Obat created successfully');
    }

    public function edit($id_obat)
    {
        $parameterObatKhusus = DB::table('parameter_obat_khusus')->get();
        $obats = Obat::findOrFail($id_obat);
        return view('obat.edit', compact('obats'));
    }

    public function update(Request $request, $id_obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'id_parameter_obat_khusus' => 'required',
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