<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParamKadaluwarsa;

class ParamKadaluwarsaController extends Controller
{
    public function index()
    {
        $ParamKadaluwarsa = DB::table('parameter_kadaluwarsa')->paginate(5);
        return view('parameter.kadaluwarsa', compact('ParamKadaluwarsa'));
    }

    public function create()
    {
        return view('parameter.kadaluwarsa-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_kadaluwarsa' => 'required|string',
            'keterangan' => 'required|regex:/[a-zA-Z ]/',
            'bobot' => 'required|integer',
        ]);
  
        // Hitung total bobot yang ada
        $totalBobot = ParamKadaluwarsa::sum('bobot');
  
        // Cek apakah total bobot + bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 10) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 10.']);
        }

        ParamKadaluwarsa::create($request->all());
  
        return redirect()->route('parameter.kadaluwarsa')->with('message', 'Parameter Kadaluwarsa created successfully');
    }

    public function edit($id_parameter_kadaluwarsa)
    {
        $ParamKadaluwarsa = ParamKadaluwarsa::findOrFail($id_parameter_kadaluwarsa);
        
        return view('parameter.kadaluwarsa-edit', compact('ParamKadaluwarsa'));
    }

    public function update(Request $request, $id_parameter_kadaluwarsa)
    {
        $request->validate([
            'tahun_kadaluwarsa' => 'required|string',
            'keterangan' => 'required|regex:/[a-zA-Z ]/',
            'bobot' => 'required|integer',
        ]);
  
        $ParamKadaluwarsa = ParamKadaluwarsa::findOrFail($id_parameter_kadaluwarsa);

        // Hitung total bobot yang ada, kecuali bobot kriteria yang sedang diupdate
        $totalBobot = ParamKadaluwarsa::where('id_parameter_kadaluwarsa', '!=', $id_parameter_kadaluwarsa)->sum('bobot');
  
        // Cek apakah bobot baru melebihi 100
        if ($totalBobot + $request->bobot > 100) {
            return redirect()->back()->withErrors(['message' => 'Total bobot tidak boleh melebihi 10.']);
        }
  
        // Update kriteria
        $ParamKadaluwarsa->update($request->all());
  
        return redirect()->route('parameter.kadaluwarsa')->with('message', 'Parameter Kadaluwarsa updated successfully');
    }

    public function destroy($id_parameter_kadaluwarsa)
    {
        $ParamKadaluwarsa = ParamKadaluwarsa::findOrFail($id_parameter_kadaluwarsa);
        $ParamKadaluwarsa->delete();
  
        return redirect()->route('parameter.kadaluwarsa')->with('message', 'Parameter Kadaluwarsa deleted successfully');
    }
}
