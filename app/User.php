<?php

namespace App;

use App\Models\ActivityLog;
use App\Models\Barcode;
use App\Models\DepositPhg;
use App\Models\ForumPhg;
use App\Models\OvernightPhg;
use App\Models\OvernightSmart;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use App\Models\TypeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'fullname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function typemail() 
    {
        return $this->hasMany(TypeMail::class);
    }

    public function tsmart() 
    {
        return $this->hasMany(TransactionSmart::class, 'user_id');
    }

    public function truck() 
    {
        return $this->hasMany(Truck::class, 'user_id');
    }

    public function overnight_smart(){
        return $this->hasMany(OvernightSmart::class, 'user_id');
    }

    public function trphg() 
    {
        return $this->hasMany(TransactionPhgt::class, 'user_id');
    }

    public function overnight_phg(){
        return $this->hasMany(OvernightPhg::class, 'user_id');
    }

    
    public function transaction_out()
    {
        return $this->hasMany(TransactionOut::class,'user_id');
    }

    public function deposit_phg()
    {
        return $this->hasMany(DepositPhg::class,'user_id');
    }

    public function forum_phg()
    {
        return $this->hasMany(ForumPhg::class,'user_id');
    }

    public function activity_log()
    {
        return $this->hasMany(ActivityLog::class,'user_id');
    }

    public function barcode()
    {
        return $this->hasMany(Barcode::class,'user_id');
    }

}
