<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = ['id_pembelian', 'id_user', 'id_suplier', 'tanggal', 'total_bayar', 'dibayar'];
    protected $primaryKey = 'id_pembelian'; // or null
    public $incrementing = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian');
    }
}
