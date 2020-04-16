<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DepositPhg extends Model
{
    protected $table = "deposit_phgs";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
