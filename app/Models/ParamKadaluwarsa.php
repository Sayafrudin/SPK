<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParamKadaluwarsa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_parameter_kadaluwarsa';
    public $table = 'parameter_kadaluwarsa';
    protected $fillable = ['tahun_kadaluwarsa', 'keterangan', 'bobot'];
}