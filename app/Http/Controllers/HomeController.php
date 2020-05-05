<?php

namespace App\Http\Controllers;

use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use App\Models\TypeMail;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $truk = Truck::count();
        $mail = TypeMail::count();
        $smart = TransactionSmart::where('tanggal', date('Y-m-d'))->sum('pendapatan');
        $phg = TransactionPhgt::where('tanggal', date('Y-m-d'))->sum('pendapatan');
        $total_pendapatan = $smart + $phg;
        $out = TransactionOut::where('created_at', 'like' , '%'.date('Y-m-d').'%')->sum('jumlah');
        $malam_smart =  TransactionSmart::where('tanggal', date('Y-m-d'))->sum('bermalam');
        $malam_phg =TransactionPhgt::where('tanggal', date('Y-m-d'))->sum('bermalam');
        $malam = $malam_smart + $malam_phg;
        $user = User::count();
        return view('layouts.dashboard', compact('truk', 'mail', 'total_pendapatan', 'out', 'malam', 'user'));
    }
}
