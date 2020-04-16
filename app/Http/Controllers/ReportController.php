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
