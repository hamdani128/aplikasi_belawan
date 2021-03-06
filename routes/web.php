<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/home', 'HomeController@landing');
Auth::routes();
Route::get('/', 'HomeController@landing')->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'HomeController@index');
    Route::get('/type_mails', "TypeMailController@index")->name('TypeMail');
    Route::post('/type_mails/create', 'TypeMailController@store')->name('create-surat');
    Route::get('/edit/type_mails/{id}', 'TypeMailController@edit');
    Route::post('/update/type_mails/{id}', 'TypeMailController@update');
    Route::get('/delete/type_mails/{id}', 'TypeMailController@destroy');

    Route::get('/truck', 'TruckController@index')->name('Truck');
    Route::post('/truck/create', 'TruckController@store')->name('create-kendaraan');
    Route::get('/truck/table', 'TruckController@table')->name('table-kendaraan');
    Route::get('/delete/trucks/{id}', 'TruckController@delete');

    Route::get('/transaction_incoming', 'TransactionController@index')->name('incoming_transaction');
    Route::get('/transaction_incoming/smart', 'TransactionController@add_smart_transaction')->name('create-smart');
    
    Route::get('/api/get-company/{truck:no_kendaraan}', 'TruckController@company')->name('trucks.company');
    Route::post('/transaction_incoming/smart/add', 'TransactionController@store')->name('create-transaction-smart');
    Route::get('/trsmart/table', 'TransactionController@table_trsmart')->name('table-trsmart');

    Route::middleware('permission:add night income')->get('/add_overnight/transaction_smart/{id}', 'TransactionController@add_overnight_smart');
    Route::post('/create/overnight/trsmart/{transactionsmart}', 'TransactionController@store_overnight_trsmart')->name('create-overnightsmart');
    Route::get('/edit/transaction_smart/{id}', 'TransactionController@edit_trsmart');
    Route::post('/transaction_incoming/smart/{id}/update', 'TransactionController@update_smart')->name('update-transaction-smart');
    Route::get('/delete/transaction_smart/{id}', 'TransactionController@delete_smart')->name('delete-smart');

    Route::get('/transaction_incoming/phg', 'TransactionController@add_phg_transaction')->name('create-phg');
    Route::post('/transaction_incoming/phg/add', 'TransactionController@store_phg')->name('create-transaction-phg');
    Route::get('/edit/transaction_phg/{id}', 'TransactionController@edit_trphg');
    Route::post('/transaction_incoming/phg/{id}/update', 'TransactionController@update_trphg')->name('update-transaction-phg');;
    Route::get('/add_overnight/transaction_phg/{id}', 'TransactionController@add_overnight_phg');
    Route::post('/create/overnight/trphg/{transactionphg}', 'TransactionController@store_overnight_trphg')->name('create-overnightphg');
    Route::get('/delete/transaction_phg/{id}', 'TransactionController@delete_phg');

    Route::get('/outgoing_transaction', 'TransactionController@index_outgoing')->name('outgoing_transaction');
    Route::post('/outgoing_transaction/create', 'TransactionController@create_troutgoing')->name('create-transaction-outgoing');
    Route::get('/edit/transaction_outgoing/{id}', 'TransactionController@edit_troutgoing');
    Route::post('/outgoing_transaction/{id}/update', 'TransactionController@update_troutgoing');
    Route::get('/delete/transaction_outgoing/{transactionout}', 'TransactionController@delete_troutgoing');

    Route::get('/overnight-smart', 'OvernightController@index_smart')->name('malam-smart');
    Route::get('/overnight-phg', 'OvernightController@index_phg')->name('malam-phg');

    Route::get('/report/incoming-transaction', 'ReportController@add_incoming')->name('report-incoming');
    Route::get('/report/outgoing-transaction', 'ReportController@add_outgoing')->name('report-outgoing');

    Route::get('/report/table/smart', 'ReportController@table_smart')->name('table-report-smart');
    Route::get('/report/table/phg', 'ReportController@table_phg')->name('table-report-phg');
    Route::get('/report/table/outgoing', 'ReportController@table_outgoing')->name('table-report-outgoing');
    Route::get('/report/trsmart', 'ReportController@trsmart_labarugi');
    Route::get('/report/sum-pendapatan/trsmart', 'ReportController@info_trsmart');
    Route::get('/report/sum-pendapatan/trphg', 'ReportController@info_trphg');
    Route::get('/report/sum-pengeluaran/trkeluar', 'ReportController@info_trkeluar');
    Route::get('/report/hasil', 'ReportController@info_hasil');

    Route::get('/print_out/transaction_smart/{id}', 'TransactionController@printout_peritem_smart');
    Route::get('/print_out/transaction_phg/{id}', 'TransactionController@printout_peritem_phg');

    Route::get('/deposit', 'RevenueController@index_deposit')->name('deposite_phg');    
    Route::get('/deposit/table', 'RevenueController@table_deposit')->name('table-depositphg');    
    Route::post('/deposit/create', 'RevenueController@add_deposit')->name('create-deposit');    

    Route::get('/forum', 'RevenueController@index_forum')->name('forum_phg');
    Route::get('/forum/table', 'RevenueController@table_forum');
    Route::post('/forum/create', 'RevenueController@add_forum')->name('create-forum');
    Route::get('/edit/forumphg/{id}', 'RevenueController@edit_forum');    
    Route::get('/activity', 'TransactionController@index_activity')->name('activity');
    Route::get('/report-labarugi', 'ReportController@add_labarugi')->name('report-labarugi');
    Route::get('/permission', 'PermissionController@index')->name('permission');

    Route::get('/forum/shift/1', 'RevenueController@shift1');
    Route::get('/setoran/add', 'RevenueController@add_setoran')->name('add-setoran');
    
    Route::get('/print/setoran/shift1', 'RevenueController@print_setoran_shift1')->name('print-setoran-shift1');
    Route::get('/print/setoran/shift2', 'RevenueController@print_setoran_shift2')->name('print-setoran-shift2');

    Route::get('/setoran/shift2', 'RevenueController@setoran_api_shift2');
    Route::get('/setoran/shift2/phg', 'RevenueController@setoran_api_shift2_phg');
    Route::get('/setoran/shift2/phg/total', 'RevenueController@setoran_api_shift2_total');
    Route::get('/setoran/shift2/acit', 'RevenueController@setoran_api_shift2_acit');
    Route::get('/setoran/shift2/bulking', 'RevenueController@setoran_api_shift2_bulking');
    Route::get('/setoran/shift2/pko', 'RevenueController@setoran_api_shift2_pko');
    Route::get('/setoran/shift2/olin', 'RevenueController@setoran_api_shift2_olin');
    Route::get('/setoran/shift2/cpo_smart', 'RevenueController@setoran_api_shift2_cpo_smart');
    Route::get('/setoran/shift2/inti', 'RevenueController@setoran_api_shift2_inti');
    Route::get('/setoran/shift2/uang/cpo-bulking', 'RevenueController@setoran_api_shift2_cpo_bulking');
    Route::get('/setoran/shift2/uang_kartu_inti', 'RevenueController@setoran_api_shift2_kartu_inti');
    Route::get('/setoran/shift2/details_mail', 'RevenueController@setoran_api_shift2_details_mail');
    Route::get('/setoran/shift2/uang_kartu_cpo', 'RevenueController@setoran_api_shift2_kartu_cpo');
    Route::get('/setoran/shift2/pendapatan', 'RevenueController@setoran_api_shift2_pendapatan');
    Route::get('/setoran/shift2/pengeluaran', 'RevenueController@setoran_api_shift2_pengeluaran');
    Route::get('/uangkartu_phg/shift2/phg', 'RevenueController@setoran_api_shift2_uang_kartu_phg');

    Route::get('/print/forum/shift1', 'RevenueController@print_forum_shift1')->name('print-forum-shift1');
    Route::get('/print/forum/shift2', 'RevenueController@print_forum_shift2')->name('print-forum-shift2');

    Route::get('/smart/rekapan/shift1', 'TransactionController@smart_rekapan_shift1')->name('smart-rekapan-shift1');
    Route::get('/smart/rekapan/shift2', 'TransactionController@smart_rekapan_shift2')->name('smart-rekapan-shift2');
    Route::get('/phg/rekapan/shift1', 'TransactionController@phg_rekapan_shift1')->name('phg-rekapan-shift1');
    Route::get('/phg/rekapan/shift2', 'TransactionController@phg_rekapan_shift2')->name('phg-rekapan-shift2');

    Route::get('/tutup-transaksi/shift1', 'TransactionController@tutup_kasir1')->name('tutup-kasir1');
    Route::get('/tutup-transaksi/shift2', 'TransactionController@tutup_kasir2')->name('tutup-kasir2');
    
    Route::get('/kasir2/phg', 'Api\KasirController@kasir2_phg');
    Route::get('/kasir2/cpo_phg', 'Api\KasirController@kasir2_cpo');
    Route::get('/kasir2/acit', 'Api\KasirController@kasir2_acit');
    Route::get('/kasir2/olin', 'Api\KasirController@kasir2_olin');
    Route::get('/kasir2/pko', 'Api\KasirController@kasir2_pko');
    Route::get('/kasir2/bulking', 'Api\KasirController@kasir2_bulking');
    Route::get('/kasir2/smart_cpo', 'Api\KasirController@kasir2_smart_cpo');
    Route::get('/kasir2/smart_inti', 'Api\KasirController@kasir2_smart_inti');
    Route::get('/kasir2/out', 'Api\KasirController@kasir2_keluar');
    Route::get('/kasir2/income', 'Api\KasirController@kasir2_pendapatan');

    Route::get('/kasir1/phg', 'Api\KasirController@kasir1_phg');
    Route::get('/kasir1/cpo_phg', 'Api\KasirController@kasir1_cpo');
    Route::get('/kasir1/acit', 'Api\KasirController@kasir1_acit');
    Route::get('/kasir1/olin', 'Api\KasirController@kasir1_olin');
    Route::get('/kasir1/pko', 'Api\KasirController@kasir1_pko');
    Route::get('/kasir1/bulking', 'Api\KasirController@kasir1_bulking');
    Route::get('/kasir1/smart_cpo', 'Api\KasirController@kasir1_smart_cpo');
    Route::get('/kasir1/smart_inti', 'Api\KasirController@kasir1_smart_inti');
    Route::get('/kasir1/out', 'Api\KasirController@kasir1_keluar');
    Route::get('/kasir1/income', 'Api\KasirController@kasir1_pendapatan');

    Route::post('/tutup-transaksi/create', 'NetincomeController@store')->name('create-kasir1');
    Route::get('/logout', 'Auth/LoginController@logout');
});

Route::middleware('role:super admin')->group(function () {
    Route::livewire('permissions/kufra/{name}', 'permissions.index')->name('permissions.index')->layout('layouts.back', ['title' => 'Setup Peran & Perizinan']);
    Route::livewire('permissions/assign', 'permissions.assign')->name('permissions.assign')->layout('layouts.back', ['title' => 'Tetapkan Peran & Perizinan']);
});
