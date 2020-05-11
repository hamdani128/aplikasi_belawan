<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TypeMail extends Model
{
    protected $table = "type_mails";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trsmart()
    {
        return $this->belongsTo(TransactionSmart::class,'surat_id');
    }

    
    public function trphg()
    {
        return $this->belongsTo(TransactionPhgt::class,'surat_id');
    }
}
