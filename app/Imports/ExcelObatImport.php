<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Obat;

class ExcelObatImport implements ToCollection, ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
    }

    public function model(array $row)
    {
        $this->current++;
        if ($this ->current>1) {
            $count = Obat::where('nama_obat', '=', $row[0])->count();
            if (empty($count)) {
                $obat = new Obat();
                $obat->nama_obat = $row[0];
                $obat->id_parameter_obat_khusus = $row[1];
                $obat->harga = $row[2];
                $obat->stok = $row[3];
                $obat->save();
            }
        }
    }
}