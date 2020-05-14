@extends('partials.app')
@section('content')
@section('title', 'Print Shift1 Setoran')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tutup Kasir</a></li>
                        <li class="breadcrumb-item active">Setoran Shift1</li>
                    </ol>
                </div>
                <h4 class="page-title">Setoran Shift 1</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print</b></button>
                </div>
                <div class="card-body printableArea">
                    <div class="table-responsive">
                        <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Total Kendaraan</th>
                                    <th>Acit (15000)</th>
                                    <th>Bulking (15000)</th>
                                    <th>Pko (15000)</th>
                                    <th>Olin (15000)</th>
                                    <th>Cpo (15000)</th>
                                    <th>Pendapatan</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td>{{ $total_kendaraan }}</td>
                                        <td>{{ $acit_total }}</td>
                                        <td>{{ $bulking_total }}</td>
                                        <td>{{ $pko_total }}</td>
                                        <td>{{ $olin_total }}</td>
                                        <td>{{ $sub_cpo }}</td>
                                        <td>{{ $total_pendapatan }}</td>
                                        <td>{{ $keluar }}</td>
                                    </tr>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('setoran')
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
