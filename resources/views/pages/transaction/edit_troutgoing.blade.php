@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Edit Transaksi Keluar')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi PT.SMART</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
                <h4 class="page-title"> Update Transaksi Pendapatan ( PT.SMART )</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row pb-2">
        <div class="col-md-4">
            <a href="{{ route('outgoing_transaction') }}" class="btn btn-success btn-md"><i class="uil-layer-group"></i> View Info Transaction</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="card card-ouline-warning">
                <div class="card-header bg-warning">
                    <h4 class="m-b-0 text-white">Data Kendaraan</h4>
                </div>
                <div class="card-body">
                <form action="/outgoing_transaction/{{ $troutgoing->id }}/update" method="POST">
                        {{-- --}}
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">No.</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" name="no" value="{{ $troutgoing->no }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Pengeluaran (Rp.)</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" name="jumlah" value="{{ $troutgoing->jumlah }}">
                                      </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">keterangan</label>
                                    <div class="input-group">
                                        <textarea name="keterangan" id="" rows="5" class="form-control">{{ $troutgoing->keterangan }}</textarea>
                                    </div>                         
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 justify-content-start">
                                    <button type="submit" class="btn btn-warning text-white"> UpdateData</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection