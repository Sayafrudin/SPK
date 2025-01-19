<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;
  
    protected $table = 'penjualan';
  
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
