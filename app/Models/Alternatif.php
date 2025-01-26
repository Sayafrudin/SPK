<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternatif extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'alternatif'; // Nama tabel
    protected $primaryKey = 'id_alternatif';
    public $timestamps = false;
    
    protected $fillable = [
        'kode_alternatif',
        'id_obat',
        'c1',
        'c2',
        'c3',
        'c4',
    ];
  
    // Definisikan relasi jika diperlukan
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}