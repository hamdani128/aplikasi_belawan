@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Pendapatan Bermalam Pt.Smart')


<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pendpatan Malam</a></li>
                        <li class="breadcrumb-item active">Pendapatan Malam</li>
                    </ol>
                </div>
                <h4 class="page-title"> Tambah Data Pendapatan Malam ( PT.Smart ) </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row pb-2">
        <div class="col-md-4">
            <a href="{{ route('incoming_transaction') }}" class="btn btn-success btn-md"><i class=" uil-left-indent-alt"></i> Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-ouline-warning">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">No.Kendaraan : {{ $transactionsmart->trucks->no_kendaraan }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('create-overnightsmart', $transactionsmart) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Jumlah (Rp.)</label>
                                    <div class="input-group">                                    
                                        <input type="number" class="form-control" name="jumlah">
                                      </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 justify-content-start">
                                    <button type="submit" class="btn btn-info text-white">Tambah Data</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection