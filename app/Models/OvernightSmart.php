<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OvernightSmart extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_smart()
    {
        return $this->belongsTo(TransactionSmart::class,'transaksi_id');
    }
}
