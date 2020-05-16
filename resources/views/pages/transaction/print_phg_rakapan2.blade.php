@extends('partials.app')
@section('content')
@section('title', 'Print Rekapan PT Phg 2')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Rekapan Data</a></li>
                        <li class="breadcrumb-item active">Shift 1</li>
                    </ol>
                </div>
                <h4 class="page-title">Rekap Data Transaksi PT Phg (Shift2)</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-md btn-info" id="print"><i class=" uil-print"></i> print</button>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-12 printableArea">
                            <div class="row">
                                <h5>Rekap Data Transaksi PT Phg Shift2</h5>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Tiket</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>No.Kendaraan</th>
                                                <th>Jenis Surat</th>
                                                <th>Pendapatan</th>
                                                <th>Bermalam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($trphg as $item)
                                                <tr>
                                                    <td>{{ $item->no }}</td>
                                                       <td>{{ $item->ticket }}</td>
                                                       <td>{{ $item->tanggal }}</td>
                                                       <td>{{ $item->jam }}</td>
                                                       <td>{{ $item->trucks->no_kendaraan }}</td>
                                                       <td>{{ $item->typemail->nama }}</td>
                                                       <td>{{ $item->pendapatan }}</td>
                                                       <td>{{ $item->bermalam }}</td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>  
                                </div> 
                            </div>
                        </div>
                     </div>  
                </div>
            </div>
        </div>
    </div>
</div>

@section('phg_rakapan2')
<script src="/assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
@endsection

@endsection
