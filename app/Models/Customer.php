<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class customer extends Model

{
    use HasFactory;
    public $table = 'tbl_customer';
    
    protected $fillable = [
        'id',
        'nik_customer',
        'nama_customer',
        'gender',
        'alamat',
        'nohp',
        
    ];
}
