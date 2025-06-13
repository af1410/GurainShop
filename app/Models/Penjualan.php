<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjualan', 'id_user', 'id_pelanggan', 'tanggal', 'total_bayar', 'dibayar', 'kembali', 'total_keuntungan'];
    protected $primaryKey = 'id_penjualan'; // or null
    public $incrementing = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}
