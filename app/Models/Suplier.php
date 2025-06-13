<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Suplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_suplier',
        'namasuplier',
        'alamatsuplier',
        'telpsuplier',
        'email',
    ];

    protected $table = 'suplier';
    public $incrementing = false; // Primary key tidak auto increment
    protected $keyType = 'string';
    protected $primaryKey = 'id_suplier'; // Set primary key kustom
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestSuplier = DB::table('suplier')->orderBy('id_suplier', 'desc')->first();

            if ($latestSuplier) {
                $lastIdNumber = intval(substr($latestSuplier->id_suplier, 3));
                $newIdNumber = str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT);
                $model->id_suplier = 'SPL' . $newIdNumber;
            } else {
                $model->id_suplier = 'SPL001';
            }
        });
    }
}
