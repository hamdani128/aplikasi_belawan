<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionSmart extends Model
{
    protected $guarded = [];

    protected $appends = [
        'bk',
        'namaSurat'
    ];

    public function getBkAttribute() {
        return $this->trucks->no_kendaraan;
    }

    public function getNamaSuratAttribute() {
        return $this->typemail->nama;
    }

    public function overnight_smart()
    {
        return $this->hasMany(OvernightSmart::class,'transaksi_id');
    }

    public function typemail()
    {
        return $this->belongsTo(TypeMail::class,'surat_id');
    }

    public function trucks()
    {
        return $this->belongsTo(Truck::class,'kendaraan_id');
    }

    public function barcode()
    {
        return $this->belongsTo(Barcode::class,'barcode_id');
    }

}
