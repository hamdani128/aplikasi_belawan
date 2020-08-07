<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\models\Netincome;
use App\Models\OvernightSmart;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use App\Models\TypeMail;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('super admin')){
            $trsmart = TransactionSmart::orderBy('no', 'DESC')->get();
            $trphg = TransactionPhgt::orderBy('no', 'DESC')->get();
            $truksmart = TransactionSmart::get()->count();
            $trukphg = TransactionPhgt::get()->count();
        }else if(Auth::user()->hasRole('admin satu')){
            $trsmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->orderBy('no','DESC')->get();
            $trphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->orderBy('no','DESC')->get();
            $truksmart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->count();
            $trukphg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->count();
        }else if(Auth::user()->hasRole('admin dua')){
            // $kemarin =date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d'))));
            // $hari = date('Y-m-d').' 19:00:00';
                $trphg = transactionPhgt::where('user_id','3')
                        ->where('created_at', '>' ,date('Y-m-d').' 19:00:00')
                        ->orWhere('user_id','3')
                        ->where('created_at', '<' ,date('Y-m-d').' 07:00:00')
                        ->get();
         
            $trsmart = TransactionSmart::where('user_id','3')
                        ->where('created_at', '>' ,date('Y-m-d').' 19:00:00')
                        ->orWhere('user_id','3')
                        ->where('created_at', '<' ,date('Y-m-d').' 07:00:00')
                        ->get();

            $trukphg = TransactionPhgt::where('user_id','3')
                        ->where('created_at', '>' ,date('Y-m-d').' 19:00:00')
                        ->orWhere('user_id','3')
                        ->where('created_at', '<' ,date('Y-m-d').' 07:00:00')
                        ->count();
            $truksmart = TransactionSmart::where('user_id','3')
                        ->where('created_at', '>' ,date('Y-m-d').' 19:00:00')
                        ->orWhere('user_id','3')
                        ->where('created_at', '<' ,date('Y-m-d').' 07:00:00')
                        ->count();
        }
        // return dd($trphg);
        return view('pages.transaction.transaksi_incoming', compact('trsmart', 'trphg', 'truksmart', 'trukphg'));
    }

    public function add_smart_transaction()
    {
        $typemail = TypeMail::where('perusahaan','PT.Smart')->get();
        $no_terakhir = TransactionSmart::OrderBy('no', 'desc')->first();
        return view('pages.transaction.add_smart', compact('typemail', 'no_terakhir'));
        // return $no_terakhir;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'no' => 'required|numeric'
        ]);
        $isThisExists = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        if ($isThisExists) {
            $truck = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        } else {
            $truck = auth()->user()->truck()->create([
                'no_kendaraan' => request('no_kendaraan'),
                'perusahaan' => request('perusahaan'),
            ]);
        }
        $barcode = auth()->user()->barcode()->create([
                'barcode' => strtotime(\Carbon\Carbon::now()),
        ]);

        auth()->user()->tsmart()->create([
            'kendaraan_id' => $truck->id,
            'ticket' => request('tiket'),
            'no' => request('no'),
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
            'barcode_id' => $barcode->id,
        ]);
        Alert::success('Success', 'Berhasil Disimpan');
        return redirect('/transaction_incoming');
    }

    public function table_trsmart()
    {
        $trsmart = TransactionSmart::get();
        return DataTables::of($trsmart)
        ->addColumn('aksi', function ($q) {
            $button = '
            <div class="row">
                <div class="d-flex ml-2 mr-1 mb-1">
                    <a href="/edit/transaction_smart/{{$q->id}}" class="btn btn-md btn-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="uil-edit"></i></a>
                </div>
                <div class="d-flex mr-1 mb-1">
                    <a href="/delete/transaction_smart/{{$q->id}}" class="btn-md btn btn-danger"  onclick="return confirm("Yakin Data Akan Dihapus ?")"  data-toggle="tooltip" data-placement="left" title="Hapus"><i class="uil-prescription-bottle"></i></a>               
                </div>
                <div class="d-flex ml-2 mr-1 mb-1">
                    <a href="/add_overnight/transaction_smart/{{$q->id}}" class="btn-md btn btn-success"  data-toggle="tooltip" data-placement="left" title="Tambah data bermalam"><i class="uil-money-withdraw"></i></a>
                </div>
                <div class="d-flex mr-1 mb-1">
                <a href="/print_out/transaction_smart/{{$q->id}}" class="btn-md btn btn-info"  data-toggle="tooltip" data-placement="left" title="Cetak Data Peritem"><i class=" uil-print"></i></a>
            </div>
            </div>';
            return $button;
        })
        ->rawColumns(['aksi'])
        ->editColumn('id', 'ID: {{$id}}')
        ->removeColumn('password')
        ->make(true);
    }

    public function add_overnight_smart($id)
    {
        $transactionsmart = TransactionSmart::find($id);
        return view('pages.transaction.overnight_smart', compact('transactionsmart'));
    }

    public function store_overnight_trsmart(Request $request, TransactionSmart $transactionsmart)
    { 
        $data = request()->all();
        $data['transaksi_id'] = $transactionsmart->id;
        auth()->user()->overnight_smart()->create($data);
        $update_malam = TransactionSmart::where('id', $transactionsmart->id)->update(array('bermalam' => $request->jumlah , 'pendapatan' => $request->jumlah + $transactionsmart->pendapatan ));
        return redirect('/transaction_incoming');
    }

    public function edit_trsmart($id)
    {   
        $trsmart = TransactionSmart::find($id);
        $typemail = TypeMail::where('perusahaan','PT.Smart')->get();
         return view('pages.transaction.edit_trsmart', compact('trsmart', 'typemail'));
    }

    public function update_smart(Request $request, $id)
    {
        $trsmart = TransactionSmart::find($id);
        request()->validate([
            'no' => 'required|numeric'
        ]);
        $isThisExists = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        if ($isThisExists) {
            $truck = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        } else {
            $truck = auth()->user()->truck()->create([
                'no_kendaraan' => request('no_kendaraan'),
                'perusahaan' => request('perusahaan'),
            ]);
        }

       $trsmart->update([
            'kendaraan_id' => $truck->id,
            'ticket' => request('tiket'),
            'no' => request('no'),
            'tanggal' => request('tanggal'),
            'jam' => request('jam'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
        ]);
        Alert::success('Success', 'Berhasil Diupdate');
        return redirect('/transaction_incoming');
    }

    public function delete_smart(Request $request,$id)
    {
        $trsmart = TransactionSmart::find($id);
        auth()->user()->activity_log()->create([
            'date' => date('Y-m-d'),
            'activity' => "/delete/transaction_smart/$trsmart->id",
            'note' => "Hapus Transaksi Pt.Smart Dengan Jumlah Pendapatan $trsmart->pendapatan",
        ]);
         $trsmart->delete($trsmart);
         Alert::success('Success', 'Berhasil Dihapus');
        return redirect('/transaction_incoming');
    }

    public function add_phg_transaction()
    {
        $typemail = TypeMail::where('perusahaan','PT.PHG')->get();
        $no_terakhir = TransactionPhgt::OrderBy('no', 'desc')->first();
        return view('pages.transaction.add_phg', compact('typemail', 'no_terakhir'));
    }

    public function store_phg()
    {
        request()->validate([
            'no' => 'required|numeric'
        ]);
        $isThisExists = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        if ($isThisExists) {
            $truck = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        } else {
            $truck = auth()->user()->truck()->create([
                'no_kendaraan' => request('no_kendaraan'),
                'perusahaan' => request('perusahaan'),
            ]);
        }

        $barcode=auth()->user()->barcode()->create([
            'barcode' => strtotime(\Carbon\Carbon::now()),
        ]);
        
        auth()->user()->trphg()->create([
            'kendaraan_id' => $truck->id,
            'ticket' => request('tiket'),
            'no' => request('no'),
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
            'barcode_id' => $barcode->id,
        ]);
        Alert::success('Success', 'Berhasil Disimpan');
        return redirect('/transaction_incoming');
    }

    public function edit_trphg($id)
    {   
        $trphg = TransactionPhgt::find($id);
        $typemail = TypeMail::where('perusahaan','PT.PHG')->get();
         return view('pages.transaction.edit_trphg', compact('trphg', 'typemail'));
    }

    public function update_trphg($id)
    {
        $trphg = TransactionPhgt::find($id);
        request()->validate([
            'no' => 'required|numeric'
        ]);
        $isThisExists = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        if ($isThisExists) {
            $truck = Truck::where('no_kendaraan', request('no_kendaraan'))->first();
        } else {
            $truck = auth()->user()->truck()->create([
                'no_kendaraan' => request('no_kendaraan'),
                'perusahaan' => request('perusahaan'),
            ]);
        }

       $trphg->update([
            'kendaraan_id' => $truck->id,
            'ticket' => request('tiket'),
            'no' => request('no'),
            'tanggal' => request('tanggal'),
            'jam' => request('jam'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
        ]);
        Alert::success('Success', 'Berhasil Diupdate');
        return redirect('/transaction_incoming');
    }

    public function add_overnight_phg($id)
    {
        $transactionphg = TransactionPhgt::find($id);
        return view('pages.transaction.overnight_phg', compact('transactionphg'));
    }

    public function store_overnight_trphg(Request $request, TransactionPhgt $transactionphg)
    { 
        $data = request()->all();
        $data['transaksi_id'] = $transactionphg->id;
        auth()->user()->overnight_phg()->create($data);
        $update_malam = TransactionPhgt::where('id', $transactionphg->id)->update(array('bermalam' => $request->jumlah , 'pendapatan' => $request->jumlah + $transactionphg->pendapatan ));
        return redirect('/transaction_incoming');
    }

    public function delete_phg($id)
    {
        $trphg = TransactionPhgt::find($id);
        auth()->user()->activity_log()->create([
            'date' => date('Y-m-d'),
            'activity' => "/delete/transaction_phg/$trphg->id",
            'note' => "Hapus Transaksi Pt.Phg Dengan Nilai $trphg->pendapatan",
        ]);
        Alert::success('Success', 'Berhasil Dihapus');
        $trphg->delete($trphg);
        return redirect('/transaction_incoming');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index_outgoing()
    {
        if(Auth::user()->hasRole('super admin')){
            $troutgoing = TransactionOut::orderBy('no','DESC')->get();
        }else if(Auth::user()->hasRole('admin satu')){
            $troutgoing = TransactionOut::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->orderBy('no','DESC')->get();
        }else if(Auth::user()->hasRole('admin dua')){
            $troutgoing = TransactionOut::where('created_at','>',date('Y-m-d ').'19:00:00')->orderBy('no','DESC')->get();
        }

        $shift1 = TransactionOut::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('jumlah');
        $shift2 = TransactionOut::where('created_at', '>=' ,date('Y-m-d').' 19:00:00')->where('created_at', '<=' ,date('Y-m-d').' 07:00:00')->sum('jumlah');
        return view('pages.transaction.transaction_outgoing', compact('troutgoing', 'shift1', 'shift2'));
    }

    public function create_troutgoing()
    {
        auth()->user()->transaction_out()->create([
            'no' => request('no'), 
            'jumlah' => request('jumlah'),
            'keterangan' => request('keterangan'),
        ]);
        return back();
    }

    public function edit_troutgoing($id)
    {
        $troutgoing = TransactionOut::find($id);
        return view('pages.transaction.edit_troutgoing', compact('troutgoing'));
    }

    public function update_troutgoing($id)
    {
        $troutgoing = TransactionOut::find($id);
        $troutgoing->update([
            'no' => request('no'),
            'jumlah' => request('jumlah'),
            'keterangan' => request('keterangan'),
        ]);
        return redirect('/outgoing_transaction');
    }

    public function delete_troutgoing($id)
    {
        $trout = TransactionOut::find($id);
        $trout->delete();
        return back();
    }


    // prinout
    public function printout_peritem_smart($id)
    {
        $trsmart = TransactionSmart::find($id);
        $barcode = \DNS1D::getBarcodeSVG($trsmart->barcode->barcode, 'c39',2,80);
        return view('pages.transaction.printout_trsmart', compact('trsmart', 'barcode'));
    }
    
    public function printout_peritem_phg($id)
    {
        $trphg = TransactionPhgt::find($id);
        $barcode = \DNS1D::getBarcodeSVG($trphg->barcode->barcode, 'C39',2,80);
        return view('pages.transaction.printout_trphg', compact('trphg', 'barcode'));
        // return $trphg;
    }

    public function index_activity()
    {   
        $activity = ActivityLog::all();
        return view('pages.activity.activity', compact('activity'));
    }

     public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kasir1_days()
    {
        $pen1 = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->get();
        $pen2 = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->get();
        $keluar =TransactionOut::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('jumlah');
        
        $sub_smart = TransactionSmart::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
        $sub_phg = TransactionPhgt::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan');
        
        $netincome = Netincome::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->sum('pendapatan_bersih');
        $detail_trout = TransactionOut::where('created_at','>',date('Y-m-d ').'07:00:00')->where('created_at','<',date('Y-m-d ').'19:00:00')->get();
        
        sleep(1);
            $result = [
                'data' => [
                    'transaction_smart' => $pen1,
                    'transaction_phg' =>  $pen2,
                    'subtotal' => [
                        collect([
                            'smart' => ''.$sub_smart.'', 
                            'phg' => ''.$sub_phg.'',
                            'pengeluaran' => ''.$keluar.'',
                            'pendapatan_bersih' => ''.$netincome.'',
                        ]), 
                    ],
                    'list_pengeluaran' => $detail_trout, 
                ],
            ];
            return response()->json($result);
    }

    public function kasir2_days()
    {
    //    $keluar =TransactionOut::where('created_at','>',date('Y-m-d ').'19:00:00')->orWhere('created_at','>',date('Y-m-d ').'19:00:00','-', 'INTERVAL 1 DAY')->where('created_at','<',date('Y-m-d ').'07:00:00')->sum('jumlah');
        
        $pen1 = TransactionSmart::where('jam','>',Carbon::createFromdate('19:00:00'))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                ->orWhere('jam','<',Carbon::createFromdate('07:00:00'))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))
                ->get();
        $pen2 = TransactionPhgt::where('jam','>',Carbon::createFromdate('19:00:00'))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                ->orWhere('jam','<',Carbon::createFromdate('07:00:00'))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                ->where('tanggal', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))
                ->get();
        
        $keluar = TransactionOut::where('created_at','>',Carbon::createFromdate('19:00:00'))
                ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                ->orWhere('created_at','<',Carbon::createFromdate('07:00:00'))
                ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                ->where('created_at', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))
                ->sum('jumlah');

         $sub_smart = TransactionSmart::where('jam','>',Carbon::createFromdate('19:00:00'))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                    ->orWhere('jam','<',Carbon::createFromdate('07:00:00'))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))
                    ->sum('pendapatan');
        $sub_phg = TransactionPhgt::where('jam','>',Carbon::createFromdate('19:00:00'))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                    ->orWhere('jam','<',Carbon::createFromdate('07:00:00'))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d')))
                    ->where('tanggal', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))
                    ->sum('pendapatan');

        $netincome = Netincome::where('created_at','>',Carbon::createFromdate('19:00:00'))
                    ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                    ->orWhere('created_at','<',Carbon::createFromdate('07:00:00'))
                    ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                    ->where('created_at', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))->sum('pendapatan_bersih');  

        $detail_trout = TransactionOut::where('created_at','>',Carbon::createFromdate('19:00:00'))
                        ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                        ->orWhere('created_at','<',Carbon::createFromdate('07:00:00'))
                        ->where('created_at', Carbon::createFromdate(date('Y-m-d')))
                        ->where('created_at', Carbon::createFromdate(date('Y-m-d'),'-','INTERVAL 1 DAY'))->get();

        sleep(1);
            $result = [
                'data' => [
                    'transaction_smart' => $pen1,
                    'transaction_phg' => $pen2,
                    'subtotal' => [
                        collect([
                            'smart' => $sub_smart, 
                            'phg' => $sub_phg,
                            'pengeluaran' => ''.$keluar.'',
                            'pendapatan_bersih' => ''.$netincome.'' ,
                        ]), 
                    ],
                    'list_pengeluaran' => $detail_trout, 
                ],
            ];
            return response()->json($result);
    }

    public function all_transaction()
    {
            sleep(1);
            $pen1 = TransactionSmart::sum('pendapatan');
            $pen2 = TransactionPhgt::sum('pendapatan');
            $month = Carbon::now()->format('m');
            $result = [
                'data' => [
                    'transaction_smart' => TransactionSmart::whereMonth('created_at', $month)->get(),
                    'transaction_phg' =>  TransactionPhgt::whereMonth('created_at', $month)->get(),    
                    'subtotal' => [
                        collect([
                            'smart' => $pen1, 
                            'phg' => $pen2,
                            'pengeluran' => TransactionOut::whereMonth('created_at', $month)->sum('jumlah'),
                            'pendapatan_bersih' => Netincome::whereMonth('created_at', $month)->sum('pendapatan_bersih'),
                        ]),    
                    ],
                    'list_pengeluaran' => TransactionOut::whereMonth('created_at', $month)->get(),   
                ],
            ];
            return response()->json($result);
    }

    public function smart_rekapan_shift1()
    {
        $trsmart = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->get();
        return view('pages.transaction.print_smart_rekapan1', compact('trsmart'));
    }

    public function smart_rekapan_shift2()
    {
        $trsmart = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 19:00:00')->where('created_at', '<=' ,date('Y-m-d').' 07:00:00')->get();
        return view('pages.transaction.print_smart_rekapan2', compact('trsmart'));
    }

    public function phg_rekapan_shift1()
    {   
        $trphg = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->get();
        return view('pages.transaction.print_phg_rekapan1', compact('trphg'));
    }

    public function phg_rekapan_shift2()
    {
        $trphg = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 19:00:00')->where('created_at', '<=' ,date('Y-m-d').' 07:00:00')->get();
        return view('pages.transaction.print_phg_rekapan2', compact('trphg'));
    }
    

    public function tutup_kasir1()
    {
        $acit = TypeMail::where('nama', 'ACIT')->first()->id; 
        $bulking = TypeMail::where('nama', 'BULKING')->first()->id; 
        $pko = TypeMail::where('nama', 'PKO')->first()->id;
        $olin = TypeMail::where('nama', 'OLIN')->first()->id; 
        $inti = TypeMail::where('nama', 'INTI')->first()->id; 
        $phg = TypeMail::where('nama', 'PHG')->first()->id; 
        $bulking_CPO = TypeMail::where('nama', 'BULKING CPO')->first()->id;
        $bulking_INTI = TypeMail::where('nama', 'BULKING INTI')->first()->id;

        $data = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00');

        $cpo2 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
        $cpo1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.Smart')->first()->id;

        $ken1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
        $ken2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
       
        $pen1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $pen2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $keluar = TransactionOut::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('jumlah');

        $Bulking_SMART1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $bulking_CPO)->count();      
        $Bulking_SMART2 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $bulking_INTI)->count();      
        
        $kartu_smart_bulking = $Bulking_SMART1 + $Bulking_SMART2;
    
        $CPO_total1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo1)->count();      
        $CPO_total2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo2)->count();      
        
        $bulking_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $bulking)->count();      
        $acit_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $acit)->count();      
        $olin_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $olin)->count();      
        $pko_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $pko)->count();      
       
        $INTI_total = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $inti)->count();
       
        $jlh_phg = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $phg)->count();
        
        $INTI = $Bulking_SMART2 + $INTI_total;
        $CPO_SMART = $CPO_total1 + $Bulking_SMART1;
        $sub_cpo = ($CPO_total1 + $CPO_total2);
        $total_kendaraan = $Bulking_SMART1 + $Bulking_SMART2 + $CPO_total1 + $CPO_total2  + $bulking_total;
        $total_pendapatan = $pen1 + $pen2;
        return view('pages.transaction.tutup_kasir1', compact('data','CPO_SMART','INTI','kartu_smart_bulking','Bulking_SMART1','Bulking_SMART2','jlh_phg','CPO_total2','ken2','total_kendaraan', 'total_pendapatan','keluar', 'sub_cpo', 'jlh_phg', 'acit_total', 'olin_total', 'pko_total', 'INTI_total', 'CPO_total2', 'CPO_total1', 'bulking_total'));
    }

    public function tutup_kasir2()
    {
        return view('pages.transaction.tutup_kasir2');
    }


}
