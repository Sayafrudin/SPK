<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    /** @use HasFactory<\Database\Factories\ObatFactory> */
    use HasFactory;

    public $table = 'obat';
    public $timestamps = false;
    protected $primaryKey = 'id_obat';
    protected $fillable = ['nama_obat', 'id_parameter_obat_khusus', 'id_parameter_kadaluwarsa', 'harga', 'stok'];

    public function parameterObatKhusus()
    {
        return $this->belongsTo(ParamObatKhusus::class, 'id_parameter_obat_khusus');
    }

    public function parameterKadaluwarsa()
    {
        return $this->belongsTo(ParamKadaluwarsa::class, 'id_parameter_kadaluwarsa');
    }
}