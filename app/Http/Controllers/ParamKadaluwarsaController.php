<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParamKadaluwarsaController extends Controller
{
    public function index()
    {
        $ParamKadaluwarsa = DB::table('parameter_kadaluwarsa')->paginate(5);
        return view('parameter.kadaluwarsa', compact('ParamKadaluwarsa'));
    }
}