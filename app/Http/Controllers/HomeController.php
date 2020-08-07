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
        // $mail = TypeMail::count();
        // $truk = Truck::get()->count();
        // $user = User::count();  
        // $smart = TransactionSmart::get()->sum('pendapatan');
        // $phg = TransactionPhgt::get()->sum('pendapatan');
        // $out = TransactionOut::get()->sum('jumlah');
        // $malam_smart =  TransactionSmart::get()->sum('bermalam');
        // $malam_phg =TransactionPhgt::get()->sum('bermalam');
        // $malam = $malam_smart + $malam_phg;
        // $total_pendapatan = $smart + $phg;
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
            $trsmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
            $trphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
            $truksmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->count();
            $malam_smart =  TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('bermalam');
            $malam_phg =TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('bermalam');
            $trukphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->get()->count();
            $out = TransactionOut::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('jumlah');

            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;

        }else if(Auth::user()->hasRole('admin dua')){
            $mail = TypeMail::get()->count();
            $truk = Truck::get()->count();
            $user = User::count();  
                        
            $out = TransactionOut::where('user_id', '3')
                    ->where('created_at','>',date('Y-m-d ').'19:00:00')
                    ->where('created_at','<',date('Y-m-d ').'07:00:00')
                    ->sum('jumlah');
            $trsmart = TransactionSmart::where('user_id', '3')
                    ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '>', '19:00:00')
                    ->orWhere('user_id','3')
                    ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '<', '07:00:00')
                     ->sum('pendapatan');
            $trphg = TransactionPhgt::where('user_id', '3')
                     ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '>', '19:00:00')
                    ->orWhere('user_id','3')
                    ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '<', '07:00:00')
                    ->sum('pendapatan');
            
            $truksmart = TransactionSmart::where('user_id', '3')
                        ->where('tanggal', date('Y-m-d'))
                        ->whereTime('jam', '>', '19:00:00')
                        ->orWhere('user_id','3')
                        ->where('tanggal', date('Y-m-d'))
                        ->whereTime('jam', '<', '07:00:00')
                        ->get()->count();
            $trukphg = TransactionPhgt::where('user_id','3')
                    ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '>', '19:00:00')
                    ->orWhere('user_id','3')
                    ->where('tanggal', date('Y-m-d'))
                    ->whereTime('jam', '<', '07:00:00')
                    ->get()->count();
            
            $malam_smart =  TransactionSmart::Where('user_id','3')
                            ->where('tanggal', date('Y-m-d'))
                            ->whereTime('jam', '>', '19:00:00')
                            ->orWhere('user_id','3')
                            ->where('tanggal', date('Y-m-d'))
                            ->whereTime('jam', '<', '07:00:00')                
                            ->sum('bermalam');
            $malam_phg =TransactionPhgt::Where('user_id','3')
                        ->where('tanggal', date('Y-m-d'))
                        ->whereTime('jam', '>', '19:00:00')
                        ->orWhere('user_id','3')
                        ->where('tanggal', date('Y-m-d'))
                        ->whereTime('jam', '<', '07:00:00')
                        ->sum('bermalam');
            
            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;
        }        
               
        return view('layouts.dashboard', compact('truk', 'mail', 'total_pendapatan', 'out', 'malam', 'user'));
    }
}
