@extends('partials.app')
@section('content')
@section('title', 'Print Shift2 Setoran')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tutup Kasir</a></li>
                        <li class="breadcrumb-item active">Setoran Shift2</li>
                    </ol>
                </div>
                <h4 class="page-title">Setoran Shift 2</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control form-control-light" name="from_date" id="from_date">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control form-control-light" name="from_date" id="to_date">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button  class="btn btn-md btn-primary ml-1" id="filter"><i class="mdi mdi-update"></i><b> refresh</b></button>
                            <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print</b></button>
                        </div>
                    </div>
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
                                    <th>inti (15000)</th>
                                    <th>Pendapatan</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ date('Y-m-d') }}</td>
                                        <td><h5 class="total_kendaraan"></h5></td>
                                        <td><h5 class="acit"></h5></td>
                                        <td><h5 class="bulking"></h5></td>
                                        <td><h5 class="pko"></h5></td>
                                        <td><h5 class="olin"></h5></td>
                                        <td><h5 class="cpo"></h5></td>
                                        <td><h5 class="inti"></h5></td>
                                        <td><h5 class="pendapatan"></h5></td>
                                        <td><h5 class="pengeluaran"></h5></td>
                                    </tr>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('setoran-shift2')
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

        $(document).ready(function(){
            $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
            });
        });

        $("#filter").click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
                if(from_date != '' &&  to_date != '') {
                    $.get('/setoran/shift2', {from_date:from_date, to_date:to_date}, function(data){
                        $(".total_kendaraan").html(data );
                    });
                    $.get('/setoran/shift2/acit', {from_date:from_date, to_date:to_date}, function(data){
                        $(".acit").html(data );
                    });
                    $.get('/setoran/shift2/bulking', {from_date:from_date, to_date:to_date}, function(data){
                        $(".bulking").html(data );
                    });
                    $.get('/setoran/shift2/pko', {from_date:from_date, to_date:to_date}, function(data){
                        $(".pko").html(data );
                    });
                    $.get('/setoran/shift2/olin', {from_date:from_date, to_date:to_date}, function(data){
                        $(".olin").html(data );
                    });
                    $.get('/setoran/shift2/cpo', {from_date:from_date, to_date:to_date}, function(data){
                        $(".cpo").html(data );
                    });
                    $.get('/setoran/shift2/inti', {from_date:from_date, to_date:to_date}, function(data){
                        $(".inti").html(data );
                    });
                    $.get('/setoran/shift2/pendapatan', {from_date:from_date, to_date:to_date}, function(data){
                        $(".pendapatan").html(data );
                    });
                    
                    $.get('/setoran/shift2/pengeluaran', {from_date:from_date, to_date:to_date}, function(data){
                        $(".pengeluaran").html(data );
                    });
                   
                } else {
                    alert('Both Date is required');
                }
        });

    </script>
@endsection

@endsection
