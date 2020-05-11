<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transactionsmart()
    {
        return $this->belongsTo(TransactionSmart::class);
    }

    public function transactionphgt()
    {
        return $this->belongsTo(TransactionPhgt::class);
    }
}
