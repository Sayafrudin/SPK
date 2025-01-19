<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParamObatKhusus extends Model
{
    use HasFactory;

    protected $table = 'parameter_obat_khusus';
    public $timestamps = false;
    protected $primaryKey = 'id_parameter_obat_khusus';
    protected $fillable = ['tipe_obat', 'bobot'];

}
