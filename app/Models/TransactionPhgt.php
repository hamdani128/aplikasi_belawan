<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TransactionPhgt extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function overnight_phg()
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
