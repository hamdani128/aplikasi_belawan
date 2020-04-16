<?php

namespace App\Http\Controllers;

use App\Models\DepositPhg;
use App\Models\ForumPhg;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TypeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function index_deposit()
    {
        $total_kendaraan  = TransactionPhgt::where('tanggal', date('Y-m-d'))->count(); 
        $acit = TypeMail::where('nama', 'ACIT')->get('id'); 
        $bulking = TypeMail::where('nama', 'BULKING')->first()->id; 
        $pko = TypeMail::where('nama', 'PKO')->first()->id;
        $olin = TypeMail::where('nama', 'OLIN')->first()->id; 
        $cpo = TypeMail::where('nama', 'CPO')->first()->id; 
        $total_acit = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $acit)->count();
        $total_bulking = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $bulking)->count();
        $total_pko = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $pko)->count();
        $total_olin = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $olin)->count();
        $total_cpo = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $cpo)->count();
        $total_malam = TransactionPhgt::where('tanggal', date('Y-m-d'))->sum('bermalam');
        $total_pengeluaran = TransactionOut::where('created_at','like','%'.date("Y-m-d").'%')->sum('jumlah');
        return view('pages.revenue.deposit', compact('total_kendaraan', 'total_acit', 'total_bulking', 'total_pko', 'total_olin', 'total_cpo', 'total_malam', 'total_pengeluaran'));
    }

    public function add_deposit(Request $request)
    {
        Auth::user()->deposit_phg()->create($request->all());
        return back();
    }

    public function table_deposit()
    {
        $data = DepositPhg::get();
        return DataTables::of($data)
        ->addColumn('aksi', function ($q) {
            $button = '
            <div class="row">
                <div class="d-flex ml-2 mr-1 mb-1">
                    <a href="/edit/depositphg/'.$q->id.'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil-edit"></i></a>
                </div>
                <div class="d-flex mr-1 mb-1">
                    <a href="/delete/depositphg/'.$q->id.'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="uil-prescription-bottle"></i></a>
                </div>
            </div>';
            return $button;
        })
        ->rawColumns(['aksi'])
        ->editColumn('id', 'ID: {{$id}}')
        ->removeColumn('password')
        ->make(true);
    }

    public function index_forum()
    {
        $total_kendaraan  = TransactionPhgt::where('tanggal', date('Y-m-d'))->count(); 
        $acit = TypeMail::where('nama', 'ACIT')->get('id'); 
        $bulking = TypeMail::where('nama', 'BULKING')->first()->id; 
        $pko = TypeMail::where('nama', 'PKO')->first()->id;
        $olin = TypeMail::where('nama', 'OLIN')->first()->id; 
        $cpo = TypeMail::where('nama', 'CPO')->first()->id; 
        $total_acit = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $acit)->count();
        $total_bulking = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $bulking)->count();
        $total_pko = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $pko)->count();
        $total_olin = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $olin)->count();
        $total_cpo = TransactionPhgt::where('tanggal', date('Y-m-d'))->where('surat_id', $cpo)->count();
        return view('pages.revenue.forum', compact('total_kendaraan', 'total_acit', 'total_bulking', 'total_pko', 'total_olin', 'total_cpo'));
    }

    public function table_forum ()
    {
        $data = ForumPhg::get();
        return DataTables::of($data)
        ->addColumn('aksi', function ($q) {
            $button = '
            <div class="row">
                <div class="d-flex ml-2 mr-1 mb-1">
                    <a href="/edit/forumphg/'.$q->id.'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil-edit"></i></a>
                </div>
                <div class="d-flex mr-1 mb-1">
                    <a href="/delete/forumphg/'.$q->id.'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="uil-prescription-bottle"></i></a>
                </div>
            </div>';
            return $button;
        })
        ->rawColumns(['aksi'])
        ->editColumn('id', 'ID: {{$id}}')
        ->removeColumn('password')
        ->make(true);
    }

    public function add_forum(Request $request)
    {
        Auth::user()->forum_phg()->create($request->all());
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
