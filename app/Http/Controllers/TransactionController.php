<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\OvernightSmart;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\Truck;
use App\Models\TypeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $trsmart = TransactionSmart::orderBy('no','DESC')->get();
        $trphg = TransactionPhgt::orderBy('no','DESC')->get();
        $truksmart = TransactionSmart::where('created_at','LIKE','%'.date('Y-m-d').'%')->count();
        $trukphg = TransactionPhgt::where('created_at','LIKE','%'.date('Y-m-d').'%')->count();
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
            'p_langsung' => request('p_langsung'),
            'p_bulking' => request('p_bulking'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
            'barcode_id' => $barcode->id,
        ]);
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
            'p_langsung' => request('p_langsung'),
            'p_bulking' => request('p_bulking'),
            'pendapatan' => request('pendapatan'),
            'bermalam' => request('bermalam'),
            'surat_id' => request('surat_id'),
        ]);
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
        $troutgoing = TransactionOut::orderBy('no','DESC')->get();
        $no_terakhir = TransactionOut::OrderBy('no', 'DESC')->first();
        $number = TransactionOut::where('created_at','LIKE','%'.date('Y-m-d').'%')->sum('jumlah');
        return view('pages.transaction.transaction_outgoing', compact('troutgoing', 'no_terakhir', 'number'));
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

    public function days()
    {
            sleep(1);
            $result = [
                'data' => [
                    'transaction_smart' => TransactionSmart::where('tanggal', date('Y-m-d'))->get(),
                    'transaction_phg' =>  TransactionPhgt::where('tanggal', date('Y-m-d'))->get(),    
                    'subtotal' =>   [ DB::table('transaction_smarts')->select(DB::raw('SUM(pendapatan) AS subsmart'))->where('tanggal', date('Y-m-d'))->get(),
                                    DB::table('transaction_phgts')->select(DB::raw('SUM(pendapatan) AS subphg'))->where('tanggal', date('Y-m-d'))->get()
                                ],    
                ]
            ];
            return response()->json($result);
    }

    public function all_transaction()
    {
            sleep(1);
            $result = [
                'data' => [
                    'transaction_smart' => TransactionSmart::get(),
                    'transaction_phg' =>  TransactionPhgt::get(),    
                    'subtotal' =>  [ DB::table('transaction_smarts')->select(DB::raw('SUM(pendapatan) AS subsmart'))->get(),
                                    DB::table('transaction_phgts')->select(DB::raw('SUM(pendapatan) AS subphg'))->get()
                                ],    
                ]
            ];
            return response()->json($result);
    }


}
