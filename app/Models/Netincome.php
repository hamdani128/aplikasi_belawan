<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Netincome extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
