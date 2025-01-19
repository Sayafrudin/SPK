<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_kriteria';
    public $table = 'kriteria';
    protected $fillable = ['kode_kriteria', 'nama_kriteria', 'tipe_kriteria', 'bobot'];
}
