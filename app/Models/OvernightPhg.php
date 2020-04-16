<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OvernightPhg extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_phg()
    {
        return $this->belongsTo(TransactionPhgt::class,'transaksi_id');
    }

}
