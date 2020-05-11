<?php

use App\Http\Resources\TransactionSmartCollection;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('daysmart', function(){
        $data = TransactionSmart::get()->where('tanggal', date('Y-m-d'));
        return response()->json($data);
});

Route::get('allsmart', function(){
    return response()->json(TransactionSmart::all());
});

Route::get('dayphg', function(){
    $data =TransactionPhgt::where('tanggal', date('Y-m-d'));
    return response()->json($data);
});

Route::get('allphg', function(){
    return response()->json(TransactionPhgt::all());
});

Route::get('all', function(){
    $data = Truck::all();
    return response()->json($data);
});

Route::get('days', function () {
    sleep(1);
    $result = [
        'data' => [
            'transaction_smart' => TransactionSmart::where('tanggal', date('Y-m-d'))->get(),
            'transaction_phg' =>  TransactionPhgt::where('tanggal', date('Y-m-d'))->get(),    
            'subtotal_smart' =>  [ TransactionSmart::where('tanggal', date('Y-m-d'))->sum('pendapatan') ],    
            'subtotal_phg' =>  [ TransactionPhgt::where('tanggal', date('Y-m-d'))->sum('pendapatan') ],    
        ]
    ];
    return response()->json($result);
});

Route::get('all', function () {
    sleep(1);
    $result = [
        'data' => [
            'transaction_smart'=> TransactionSmart::get(),
            'transaction_phg' => TransactionPhgt::get(),
            'subtotal_smart' => [ TransactionSmart::sum('pendapatan') ],    
            'subtotal_phg' =>  [ TransactionPhgt::sum('pendapatan') ],    
        ]
    ];
    return response()->json($result);
});


