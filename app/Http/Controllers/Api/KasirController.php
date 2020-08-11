<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransactionOut;
use App\Models\TransactionPhgt;
use App\Models\TransactionSmart;
use App\Models\TypeMail;
use Illuminate\Http\Request;

class KasirController extends Controller
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

    // Api Kasir 2
    public function kasir2_cpo(Request $request)
    {
        if(!empty($request->from_date))
        {
            $cpo_phg = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $cpo_phg)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_acit(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'ACIT')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_olin(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'OLIN')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_pko(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'PKO')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_bulking(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'BULKING')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_smart_cpo(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.Smart')->first()->id;
            $surat_id2 = TypeMail::where('nama', 'BULKING CPO')->where('perusahaan', 'PT.Smart')->first()->id;
            
            $tsmart1 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id1)
                    ->count();
            $tsmart2 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id2)
                    ->count();

            $hasil = $tsmart1 + $tsmart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_smart_inti(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id1 = TypeMail::where('nama', 'INTI')->where('perusahaan', 'PT.Smart')->first()->id;
            $surat_id2 = TypeMail::where('nama', 'BULKING INTI')->where('perusahaan', 'PT.Smart')->first()->id;
            
            $tsmart1 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id1)
                    ->count();
            $tsmart2 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->where('surat_id', $surat_id2)
                    ->count();
                    
            $hasil = $tsmart1 + $tsmart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_phg(Request $request)
    {
        if(!empty($request->from_date))
        {
            $phg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->count();
            $hasil = $phg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir2_keluar(Request $request)
    {
        if(!empty($request->from_date))
        {
            $keluar = TransactionOut::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'00:00:00')
                    ->whereTime('created_at', '<' ,'07:00:00')
                    ->sum('jumlah');
            $hasil = $keluar;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }


    // Api Kasir 1

    public function kasir1_cpo(Request $request)
    {
        if(!empty($request->from_date))
        {
            $cpo_phg = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $cpo_phg)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_acit(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'ACIT')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_olin(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'OLIN')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_pko(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'PKO')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_bulking(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id = TypeMail::where('nama', 'BULKING')->where('perusahaan', 'PT.PHG')->first()->id;
            $trphg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id)
                    ->count();
            $hasil = $trphg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_smart_cpo(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id1 = TypeMail::where('nama', 'CPO')->where('perusahaan', 'PT.Smart')->first()->id;
            $surat_id2 = TypeMail::where('nama', 'BULKING CPO')->where('perusahaan', 'PT.Smart')->first()->id;
            
            $tsmart1 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id1)
                    ->count();
            $tsmart2 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id2)
                    ->count();

            $hasil = $tsmart1 + $tsmart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_smart_inti(Request $request)
    {
        if(!empty($request->from_date))
        {
            $surat_id1 = TypeMail::where('nama', 'INTI')->where('perusahaan', 'PT.Smart')->first()->id;
            $surat_id2 = TypeMail::where('nama', 'BULKING INTI')->where('perusahaan', 'PT.Smart')->first()->id;
            
            $tsmart1 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id1)
                    ->count();
            $tsmart2 = TransactionSmart::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->where('surat_id', $surat_id2)
                    ->count();
                    
            $hasil = $tsmart1 + $tsmart2;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_phg(Request $request)
    {
        if(!empty($request->from_date))
        {
            $phg = TransactionPhgt::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->count();
            $hasil = $phg;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }

    public function kasir1_keluar(Request $request)
    {
        if(!empty($request->from_date))
        {
            $keluar = TransactionOut::whereDate('created_at', '=' ,date($request->from_date))
                    ->whereTime('created_at', '>' ,'07:00:00')
                    ->whereTime('created_at', '<' ,'24:00:00')
                    ->sum('jumlah');
            $hasil = $keluar;
        }
        else    
        {
            $hasil = 0;
        }
        return  $hasil;
    }



}
