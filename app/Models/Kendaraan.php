<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Kendaraan extends Model
{
    use HasFactory;

    public $table = 'tbl_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    
    protected $fillable = [
        'id_kendaraan',
        'kode_kendaraan',
        'nama_kendaraan',
        'merek_kendaraan',
        'harga',
        'stok',
        'ket',
        'gambar'
    ];

}
