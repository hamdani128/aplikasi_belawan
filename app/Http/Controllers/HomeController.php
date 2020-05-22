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
        $mail = TypeMail::count();
        if(Auth::user()->hasRole('super admin')){
            $smart = TransactionSmart::get()->sum('pendapatan');
            $phg = TransactionPhgt::get()->sum('pendapatan');
            $total_pendapatan = $smart + $phg;
            $out = TransactionOut::get()->sum('jumlah');
            $malam_smart =  TransactionSmart::get()->sum('bermalam');
            $malam_phg =TransactionPhgt::get()->sum('bermalam');
            $malam = $malam_smart + $malam_phg;
            $truk = Truck::count();
        }else if(Auth::user()->hasRole('admin satu')){
            $trsmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
            $trphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
            $truksmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->count();
            $malam_smart =  TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('bermalam');
            $malam_phg =TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('bermalam');
            $trukphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->count();
            $out = TransactionOut::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('jumlah');
            
            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;

        }else if(Auth::user()->hasRole('admin dua')){
            $out = TransactionOut::where('created_at','>',date('Y-m-d ').'19:00:00')->where('created_at','<',date('Y-m-d ').'07:00:00')->sum('jumlah');
            $trsmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'19:00:00')->orWhere('created_at','>',date('Y-m-d ').'19:00:00','-', 'INTERVAL 1 DAY')->where('created_at','<',date('Y-m-d ').'07:00:00')->get();
            $trphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'19:00:00')->orWhere('created_at','>',date('Y-m-d ').'19:00:00','-', 'INTERVAL 1 DAY')->where('created_at','<',date('Y-m-d ').'07:00:00')->get();
            $truksmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'19:00:00')->where('created_at','<',date('Y-m-d ').'07:00:00')->count();
            $trukphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'19:00:00')->where('created_at','<',date('Y-m-d ').'07:00:00')->count();
            $malam_smart =  TransactionSmart::where('created_at','>',date('Y-m-d ').'19:00:00')->where('created_at','<',date('Y-m-d ').'07:00:00')->sum('bermalam');
            $malam_phg =TransactionPhgt::where('created_at','>',date('Y-m-d ').'19:00:00')->where('created_at','<',date('Y-m-d ').'07:00:00')->sum('bermalam');
            $malam = $malam_smart + $malam_phg;
            $total_pendapatan = $trsmart + $trphg;
            $truk = $truksmart + $trukphg;
        }        
        $user = User::count();        
        return view('layouts.dashboard', compact('truk', 'mail', 'total_pendapatan', 'out', 'malam', 'user'));
    }
}
