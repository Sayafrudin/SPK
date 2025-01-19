<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParamObatKhusus;

class ParamObatKhususController extends Controller
{
    public function index()
    {
        $ParamObatKhusus = DB::table('parameter_obat_khusus')->paginate(5);
        return view('parameter.obat-khusus', compact('ParamObatKhusus'));
    }

    public function create()
    {
        return view('parameter.khusus-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe_obat' => 'required|regex:/[a-zA-Z ]/',
            'bobot' => 'required|integer',
        ]);
  
        // Hitung total bobot yang ada
        $totalBobot = ParamObatKhusus::sum('bobot');
  
        // Cek apakah total bobot + bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 10) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 10.']);
        }

        ParamObatKhusus::create($request->all());
  
        return redirect()->route('parameter.obat-khusus')->with('message', 'Parameter Obat Khusus created successfully');
    }

    public function edit($id_parameter_obat_khusus)
    {
        $ParamObatKhusus = ParamObatKhusus::findOrFail($id_parameter_obat_khusus);
        
        return view('parameter.khusus-edit', compact('ParamObatKhusus'));
    }

    public function update(Request $request, $id_parameter_obat_khusus)
    {
        $request->validate([
            'tipe_obat' => 'required|regex:/[a-zA-Z ]/',
            'bobot' => 'required|integer',
        ]);
  
        $ParamObatKhusus = ParamObatKhusus::findOrFail($id_parameter_obat_khusus);

        // Hitung total bobot yang ada, kecuali bobot kriteria yang sedang diupdate
        $totalBobot = ParamObatKhusus::where('id_parameter_obat_khusus', '!=', $id_parameter_obat_khusus)->sum('bobot');
  
        // Cek apakah bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 100) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 10.']);
        }
  
        // Update kriteria
        $ParamObatKhusus->update($request->all());
  
        return redirect()->route('parameter.obat-khusus')->with('message', 'Parameter Obat Khusus updated successfully');
    }

    public function destroy($id_parameter_obat_khusus)
    {
        $ParamObatKhusus = ParamObatKhusus::findOrFail($id_parameter_obat_khusus);
        $ParamObatKhusus->delete();
  
        return redirect()->route('parameter.obat-khusus')->with('message', 'Parameter Obat Khusus deleted successfully');
    }
}
