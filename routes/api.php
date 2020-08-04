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
Route::get('kasir1_days', 'TransactionController@kasir1_days');
Route::get('kasir2_days', 'TransactionController@kasir2_days');
Route::get('all', 'TransactionController@all_transaction');

