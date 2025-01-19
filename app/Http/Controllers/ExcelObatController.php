<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelObatImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelObatController extends Controller
{
    public function import_excel(Request $request)
    {
        Excel::import(new ExcelObatImport, $request->file('excel_file'));

        return redirect()->route('obat.index')->with('message', 'Excel data is impported successfully');
    }

}