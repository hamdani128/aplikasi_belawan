<?php

use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
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
        $data = TransactionSmart::get()->where('tanggal', date('2020-05-09'));
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
    return response()->json(TransactionSmart::all());
});

