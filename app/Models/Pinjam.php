<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    public $table = 'pinjam';
    
    protected $fillable = [
        'id',
        'no_ref',
        'nm_customer',
        'kode_kendaraan',
        'jumlah_pinjam',
        'lama_pinjam',
        'tgl_pinjam',
        'tgl_kembali',
        'total'
    ];
}
