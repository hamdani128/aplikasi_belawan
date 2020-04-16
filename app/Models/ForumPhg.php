<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumPhg extends Model
{
    protected $table ='forum_phgs';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
