<?php

namespace App\Http\Controllers;

use App\Models\DepositPhg;
use App\Models\ForumPhg;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
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

    public function edit_forum($id)
    {
        $forum = ForumPhg::find($id);
        return view('pages.revenue.edit_forum', compact('forum', 'total_kendaraan'));
    }

    public function shift1(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trsmart = TransactionSmart::whereBetween('tanggal', array($request->from_date, $request->to_date))->count('id');           
            $trphg = TransactionPhgt::whereBetween('tanggal', array($request->from_date, $request->to_date))->count('id');                      
            $hasil = $trsmart + $trphg;
        }
        else    
        {
            $hasil = 0;
            // $trout = TransactionOut::whereBetween('tanggal', array(date('Y-m-d'), date('Y-m-d')))->sum('pendapatan');;
        }
        return  $hasil;
    }

    public function add_setoran(){
        $acit = TypeMail::where('nama', 'ACIT')->first()->id; 
        $bulking = TypeMail::where('nama', 'BULKING')->first()->id; 
        $pko = TypeMail::where('nama', 'PKO')->first()->id;
        $olin = TypeMail::where('nama', 'OLIN')->first()->id; 
        $inti = TypeMail::where('nama', 'INTI')->first()->id; 
        $cpo2 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
        $cpo1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.Smart')->first()->id;

        $ken1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
        $ken2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
       
        $pen1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $pen2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $keluar = TransactionOut::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('jumlah');

        $CPO_total1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo1)->count();      
        $CPO_total2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo2)->count();      
        
        $bulking_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $bulking)->count();      
        $acit_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $acit)->count();      
        $olin_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $olin)->count();      
        $pko_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $pko)->count();      
        $INTI_total1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $inti)->count();
        
        $sub_cpo = $CPO_total1 + $CPO_total2;
        $total_kendaraan = $ken1 + $ken2;
        $total_pendapatan = $pen1 + $pen2;
        return view('pages.revenue.add_setoran', compact('total_kendaraan', 'sub_cpo', 'INTI_total1','bulking_total', 'acit_total', 'olin_total', 'pko_total', 'total_pendapatan', 'keluar'));
    }




    public function print_setoran_shift1()
    {

        $acit = TypeMail::where('nama', 'ACIT')->first()->id; 
        $bulking = TypeMail::where('nama', 'BULKING')->first()->id; 
        $pko = TypeMail::where('nama', 'PKO')->first()->id;
        $olin = TypeMail::where('nama', 'OLIN')->first()->id; 
        $inti = TypeMail::where('nama', 'INTI')->first()->id; 
        $cpo2 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
        $cpo1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.Smart')->first()->id;

        $ken1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
        $ken2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->count();
       
        $pen1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $pen2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('pendapatan');
        $keluar = TransactionOut::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->sum('jumlah');

        $CPO_total1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo1)->count();      
        $CPO_total2 = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $cpo2)->count();      
        
        $bulking_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $bulking)->count() * 15000;      
        $acit_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $acit)->count() * 15000;      
        $olin_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $olin)->count() * 15000;      
        $pko_total = TransactionPhgt::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $pko)->count() * 15000;      
        $INTI_total1 = TransactionSmart::where('created_at', '>=' ,date('Y-m-d').' 07:00:00')->where('created_at', '<=' ,date('Y-m-d').' 19:00:00')->where('surat_id', $inti)->count() * 15000;
        
        $sub_cpo = ($CPO_total1 + $CPO_total2) * 15000;
        $total_kendaraan = $ken1 + $ken2;
        $total_pendapatan = $pen1 + $pen2;
        
        return view('pages.revenue.print_setoran_shift1', compact('total_kendaraan', 'sub_cpo', 'INTI_total1','bulking_total', 'acit_total', 'olin_total', 'pko_total', 'total_pendapatan', 'keluar'));
    }

    public function print_setoran_shift2()
    {

        return view('pages.revenue.print_setoran_shift2');
    }

    //  this is Api ---------------------------------------------------------------

    public function setoran_api_shift2(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trsmart = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->count();           
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->count();
            $hasil = $trphg+$trsmart;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_phg(Request $request)
    {
        if(!empty($request->from_date))
        {
            // $trsmart = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->count();           
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_acit(Request $request)
    {
        if(!empty($request->from_date))
        {
            $acit = TypeMail::where('nama', 'ACIT')->first()->id;
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $acit)->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_bulking(Request $request)
    {
        if(!empty($request->from_date))
        {
            $acit = TypeMail::where('nama', 'BULKING')->first()->id;
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $acit)->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_pko(Request $request)
    {
        if(!empty($request->from_date))
        {
            $acit = TypeMail::where('nama', 'PKO')->first()->id;
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $acit)->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_olin(Request $request)
    {
        if(!empty($request->from_date))
        {
            $acit = TypeMail::where('nama', 'OLIN')->first()->id;
            $trphg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $acit)->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_cpo_smart(Request $request)
    {
        if(!empty($request->from_date))
        {
           
            $cpo2 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.smart')->first()->id;
            $cpo3 = TypeMail::where('nama', 'BULKING CPO')->first()->id;
            $smart1 = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $cpo2)->count();
            $smart2 = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $cpo3)->count();
            $hasil = $smart1 + $smart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_inti(Request $request)
    {
        if(!empty($request->from_date))
        {
            $cpo2 = TypeMail::where('nama', 'INTI')->first()->id;
            $bulking3 = TypeMail::where('nama', 'BULKING INTI')->first()->id;
            $smart1 = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $cpo2)->count();
            $smart2 = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $bulking3)->count();
            $hasil = $smart1 + $smart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_pendapatan(Request $request)
    {
        if(!empty($request->from_date) && !empty($request->to_date))
        {
            $smart = TransactionSmart::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->sum('pendapatan');
            $phg = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->sum('pendapatan');
            $hasil = $smart + $phg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_pengeluaran(Request $request)
    {
        if(!empty($request->from_date))
        {
            $keluar = TransactionOut::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->sum('jumlah');
            $hasil = $keluar;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function setoran_api_shift2_cpo_bulking(Request $request)
    {
        if(!empty($request->from_date))
        {
             $cpo1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
             $jlh1 = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $cpo1)->count();
             $bulking = TypeMail::where('nama', 'BULKING')->first()->id;
             $jlh2 = TransactionPhgt::where('created_at', '>=' ,date($request->from_date).' 19:00:00')->where('created_at', '<=' ,date($request->to_date).' 07:00:00')->where('surat_id', $bulking)->count();
             $hasil = $jlh1 + $jlh2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }


    public function print_forum_shift1()
    {
        return view('pages.revenue.print_forum_shift1');
    }

    public function print_forum_shift2()
    {
        return view('pages.revenue.print_forum_shift2');
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
