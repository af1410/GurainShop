<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'namapelanggan',
        'alamatpelanggan',
        'telppelanggan',
        'email',
    ];

    protected $table = 'pelanggan';
    public $incrementing = false; // Primary key tidak auto increment
    protected $keyType = 'string';
    protected $primaryKey = 'id_pelanggan'; // Set primary key kustom
    protected static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            $latestPelanggan = DB::table('pelanggan')->orderBy('id_pelanggan', 'desc')->first();

            if ($latestPelanggan) {
                $lastIdNumber = intval(substr($latestPelanggan->id_pelanggan, 3));
                $newIdNumber = str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
                $model->id_pelanggan = 'PLG' . $newIdNumber;
            } else {
                $model->id_pelanggan = 'PLG001';
            }
        });
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'id_pelanggan');
    }
}
