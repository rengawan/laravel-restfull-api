<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'barang_kode',
        'kategori_id',
        'barang_nama',
        'barang_barcode',
        'barang_satuan',
    ];

    protected $table = 'barang';
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
