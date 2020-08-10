<?php

namespace App\Http\Controllers;

use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use App\Models\TypeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function landing()
    {
        return view('layouts.landing');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->hasRole('super admin')){
            $mail = TypeMail::get()->count();
            $truk = Truck::get()->count();
            $user = User::count();  
            $smart = TransactionSmart::get()->sum('pendapatan');
            $phg = TransactionPhgt::get()->sum('pendapatan');
            $out = TransactionOut::get()->sum('jumlah');
            $malam_smart =  TransactionSmart::get()->sum('bermalam');
            $malam_phg =TransactionPhgt::get()->sum('bermalam');
            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $smart + $phg;

        }else if(Auth::user()->hasRole('admin satu')){
            $mail = TypeMail::get()->count();
            $truk = Truck::get()->count();
            $user = User::count(); 
            
            $trsmart = TransactionSmart::where('user_id','2')
            ->whereDate('created_at','=',date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->sum('pendapatan');
            
            $trphg = TransactionPhgt::where('user_id','2')
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->sum('pendapatan');
            
            $truksmart = TransactionSmart::where('user_id','2')
            ->whereDate('created_at','=', date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->count();
            
            $malam_smart =  TransactionSmart::where('user_id','2')
            ->whereDate('created_at', '=' ,date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->sum('bermalam');
            
            $malam_phg =TransactionPhgt::where('user_id','2')
            ->whereDate('created_at', '=' ,date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->sum('bermalam');
            
            $trukphg = TransactionPhgt::where('user_id','2')
            ->whereDate('created_at', '=' ,date('Y-m-d'))
            ->whereTime('created_at','>','07:00:00')
            ->whereTime('created_at','<','24:00:00')
            ->get()->count();
            
            $out = TransactionOut::whereDate('created_at', '=', date('Y-m-d'))
            ->whereTime('created_at', '>', '07:00:00')
            ->sum('jumlah');

            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;

        }else if(Auth::user()->hasRole('admin dua')){
            $mail = TypeMail::get()->count();
            $truk = Truck::get()->count();
            $user = User::count();  
                        
            $trsmart = TransactionSmart::where('user_id', '3')
                    ->whereDate('created_at', '=', date('Y-m-d'))
                    ->whereTime('created_at', '>', '00:00:00')
                    ->whereTime('created_at', '<', '07:00:00')
                     ->sum('pendapatan');

                     
            $trphg = TransactionPhgt::where('user_id', '3')
                    ->whereDate('created_at', '=', date('Y-m-d'))
                    ->whereTime('created_at', '>', '00:00:00')
                    ->whereTime('created_at', '<', '07:00:00')
                    ->sum('pendapatan');

            $truksmart = TransactionSmart::where('user_id', '3')
                        ->whereDate('created_at', '=', date('Y-m-d'))
                        ->whereTime('created_at', '>', '00:00:00')
                        ->whereTime('created_at', '<', '07:00:00')
                        ->get()->count();
            $trukphg = TransactionPhgt::where('user_id','3')
                        ->whereDate('created_at', '=', date('Y-m-d'))
                        ->whereTime('created_at', '>', '00:00:00')
                        ->whereTime('created_at', '<', '07:00:00')
                        ->get()->count();
    
            $malam_smart =  TransactionSmart::Where('user_id','3')
                            ->whereDate('created_at', '=', date('Y-m-d'))
                            ->whereTime('created_at', '>', '00:00:00')
                            ->whereTime('created_at', '<', '07:00:00')             
                            ->sum('bermalam');
            $malam_phg =TransactionPhgt::Where('user_id','3')
                        ->whereDate('created_at', '=', date('Y-m-d'))
                        ->whereTime('created_at', '>', '00:00:00')
                        ->whereTime('created_at', '<', '07:00:00')
                        ->sum('bermalam');
            
            $out = TransactionOut::whereDate('created_at', '=', date('Y-m-d'))
            ->whereTime('created_at', '<', '07:00:00')
            ->sum('jumlah');

            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;

        }        
               
        return view('layouts.dashboard', compact('truk', 'mail', 'total_pendapatan', 'out', 'malam', 'user'));
    }
}
