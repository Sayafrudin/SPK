<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = DB::table('kriteria')->paginate(5);
        return view('spk.kriteria', compact('kriterias'));
    }

    public function create()
    {
        return view('spk.kriteria-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'tipe_kriteria' => 'required|in:Benefit,Cost',
            'bobot' => 'required|integer',
        ]);
  
        // Hitung total bobot yang ada
        $totalBobot = Kriteria::sum('bobot');
  
        // Cek apakah total bobot + bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 100) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 100.']);
        }

        Kriteria::create($request->all());
  
        return redirect()->route('spk.kriteria')->with('message', 'Kriteria created successfully');
    }

    public function edit($id_kriteria)
    {
        $kriterias = Kriteria::findOrFail($id_kriteria);
        
        return view('spk.kriteria-edit', compact('kriterias'));
    }

    public function update(Request $request, $id_kriteria)
    {
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required|regex:/[a-zA-Z ]/',
            'tipe_kriteria' => 'required|in:Benefit,Cost',
            'bobot' => 'required|integer',
        ]);
  
        $kriterias = Kriteria::findOrFail($id_kriteria);

        // Hitung total bobot yang ada, kecuali bobot kriteria yang sedang diupdate
        $totalBobot = Kriteria::where('id_kriteria', '!=', $id_kriteria)->sum('bobot');
  
        // Cek apakah bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 100) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 100.']);
        }
  
        // Update kriteria
        $kriterias->update($request->all());
  
        return redirect()->route('spk.kriteria')->with('message', 'Kriteria updated successfully');
    }

    public function destroy($id_kriteria)
    {
        $kriterias = Kriteria::findOrFail($id_kriteria);
        $kriterias->delete();
  
        return redirect()->route('spk.kriteria')->with('message', 'Kriteria deleted successfully');
    }
}
