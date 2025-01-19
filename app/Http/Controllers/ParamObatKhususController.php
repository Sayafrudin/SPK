<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParamObatKhususController extends Controller
{
    public function index()
    {
        $ParamObatKhusus = DB::table('parameter_obat_khusus')->paginate(5);
        return view('parameter.obat-khusus', compact('ParamObatKhusus'));
    }
}