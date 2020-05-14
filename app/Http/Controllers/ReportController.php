<?php

namespace App\Http\Controllers;

use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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

    public function add_incoming()
    {
        return view('pages.report.incoming');
    }
    public function add_outgoing()
    {
        return view('pages.report.outgoing');
    }

    public function table_smart(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = TransactionSmart::with('trucks', 'typemail')->select('transaction_smarts.*');
                        $data->whereBetween('tanggal', array($request->from_date, $request->to_date))
                        ->get();
            }
            else    
            {
                $data = TransactionSmart::with('trucks', 'typemail')->select('transaction_smarts.*')->get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    public function table_phg(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = TransactionPhgt::with('trucks', 'typemail')->select('transaction_phgts.*');
                        $data->whereBetween('tanggal', array($request->from_date, $request->to_date))
                        ->get();
            }
            else    
            {
                $data = TransactionPhgt::with('trucks', 'typemail')->select('transaction_phgts.*')->get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    public function table_outgoing(Request $request)
    {
        
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $start = date('Y-m-d',strtotime($request->from_date));
                $end = date('Y-m-d',strtotime($request->to_date));
                $data = TransactionOut::whereDate('created_at', '>=' ,array($request->from_date))->whereDate('created_at', '<=' ,array($request->to_date));
                // $data = TransactionOut::whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))->get();
            }
            else    
            {
                $data = TransactionOut::get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    public function add_labarugi()
    {
        return view('pages.report.labarugi');
    }

    public function trsmart_labarugi(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
                {
                $data = TransactionSmart::whereDate('tanggal', array($request->from_date))->whereDate('tanggal', array($request->to_date))->sum('pendapatan');
                // $data = TransactionOut::whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))->get();
            }
            else    
            {
                $data = TransactionSmart::get();
            }
            return datatables()->of($data)->make(true);
        }
    }

    public function info_trsmart(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trsmart = TransactionSmart::whereBetween('tanggal', array($request->from_date, $request->to_date))->sum('pendapatan');           
            //  $data = TransactionOut::whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))->get();
        }
        else    
        {
            $trsmart = 0;
        }
        return $trsmart;
    }

    public function info_trphg(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trphg = TransactionPhgt::whereBetween('tanggal', array($request->from_date, $request->to_date))->sum('pendapatan');           
            //  $data = TransactionOut::whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))->get();
        }
        else    
        {
            $trphg = 0;
        }
        return $trphg;
    }

    public function info_trkeluar(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trout = TransactionOut::whereDate('created_at', '>=' ,array($request->from_date))->whereDate('created_at', '<=' ,array($request->to_date))->sum('jumlah');           
            //  $data = TransactionOut::whereBetween('created_at', array($start->toDateTimeString(), $end->toDateTimeString()))->get();
        }
        else    
        {
            $trout = TransactionOut::whereDate('created_at', '>=' ,array(date('Y-m-d')))->whereDate('created_at', '<=' ,array(date('Y-m-d')))->sum('jumlah');           
            // $trout = TransactionOut::whereBetween('tanggal', array(date('Y-m-d'), date('Y-m-d')))->sum('pendapatan');;
        }
        return  $trout;
    }

    public function info_hasil(Request $request)
    {
        if(!empty($request->from_date))
        {
            $trsmart = TransactionSmart::whereBetween('tanggal', array($request->from_date, $request->to_date))->sum('pendapatan');           
            $trphg = TransactionPhgt::whereBetween('tanggal', array($request->from_date, $request->to_date))->sum('pendapatan');           
            $trout = TransactionOut::whereDate('created_at', '>=' ,array($request->from_date))->whereDate('created_at', '<=' ,array($request->to_date))->sum('jumlah');           
            $hasil = ($trsmart + $trphg) - $trout;
        }
        else    
        {
            $hasil = 0;
            // $trout = TransactionOut::whereBetween('tanggal', array(date('Y-m-d'), date('Y-m-d')))->sum('pendapatan');;
        }
        return  $hasil;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
