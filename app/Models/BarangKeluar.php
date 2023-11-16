<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vendor(){
        return $this -> belongsTo(Vendor::class, 'vendor_id');
    }

    public function barang(){
        return $this -> belongsTo(Barang::class, 'barang_id');
    }
}
