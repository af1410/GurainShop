<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false; // Menonaktifkan auto-increment
    protected $fillable = ['id_barang', 'namabarang', 'hargabarang', 'hargajual', 'keuntungan', 'jumlahbarang', 'satuanbarang'];

    protected static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            $latestBarang = DB::table('barang')->orderBy('id_barang', 'desc')->first();

            if ($latestBarang) {
                $lastIdNumber = intval(substr($latestBarang->id_barang, 3));
                $newIdNumber = str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
                $model->id_barang = 'BRG' . $newIdNumber;
            } else {
                $model->id_barang = 'BRG001';
            }
        });
    }
}
