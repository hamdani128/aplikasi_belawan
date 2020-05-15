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
                        <li class="breadcrumb-item active">Forum Shift1</li>
                    </ol>
                </div>
                <h4 class="page-title">Forum Shift 1</h4>
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
                            <button  class="btn btn-md btn-primary ml-1" id="filter"><i class="mdi mdi-updatet"></i><b> refresh</b></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Harga (Kwitansi)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_kwitansi" id="harga_kwitansi">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_kwitansi" id="jlh_kwitansi">
                                        <button class="btn btn-md btn-info ml-1" id="filter_kwitansi"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Harga (Mandor)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_mandor">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_mandor">
                                        <button class="btn btn-md btn-info ml-1" id="filter_mandor"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Harga (BPJS)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_bpjs">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_bpjs">
                                        <button class="btn btn-md btn-info ml-1" id="filter_bpjs"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Harga (CPO)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_cpo">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_cpo">
                                        <button class="btn btn-md btn-info ml-1" id="filter_cpo"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="">Harga (Olin)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_olin">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_olin">
                                        <button class="btn btn-md btn-info ml-1" id="filter_olin"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Harga (PKO)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_pko">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_pko">
                                        <button class="btn btn-md btn-info ml-1" id="filter_pko"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="">Harga (Bulking)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control harga_mandor" id="harga_bulking">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="">Jumlah</label>
                                    <div class="input-group">
                                        <input type="text" class=" form-control jlh_mandor" id="jlh_bulking">
                                        <button class="btn btn-md btn-info ml-1" id="filter_bulking"><i class="mdi mdi-refresh"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>
                    <div class="row">
                        <div class="table-responsive printableArea">
                            <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kwitansi (5000)</th>
                                        <th>Mandor (8000)</th>
                                        <th>CPO (5000)</th>
                                        <th>OLIN (10000)</th>
                                        <th>PKO (10000)</th>
                                        <th>Bulking (15000)</th>
                                        <th>BPJS (10000) /14 Orang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ date('Y-m-d') }}</td>
                                            <td><h5 id="kwitansi"></h5></td>
                                            <td><h5 id="mandor"></h5></td>
                                            <td><h5 id="cpo"></h5></td>
                                            <td><h5 id="olin"></h5></td>
                                            <td><h5 id="pko"></h5></td>
                                            <td><h5 id="bulking"></h5></td>
                                            <td><h5 id="bpjs"></h5></td>
                                        </tr>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <button class="btn btn-md btn-info" id="print"><i class="mdi mdi-printer-check"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('forum-shift2')
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

        $("#filter_kwitansi").click(function(){
        var hrg = $('#harga_kwitansi').val();
        var jlh = $('#jlh_kwitansi').val();
        var hsl= hrg * jlh;
            document.getElementById("kwitansi").innerHTML = hsl;
        });

        $("#filter_mandor").click(function(){
        var harga = $('#harga_mandor').val();
        var jumlah = $('#jlh_mandor').val();
        var hasil= harga * jumlah;
            document.getElementById("mandor").innerHTML = hasil;
        });

        $("#filter_bpjs").click(function(){
        var hrg = $('#harga_bpjs').val();
        var jlh = $('#jlh_bpjs').val();
        var hsl= hrg * jlh;
            document.getElementById("bpjs").innerHTML = hsl;
        });

        $("#filter_cpo").click(function(){
        var hrg = $('#harga_cpo').val();
        var jlh = $('#jlh_cpo').val();
        var hsl= hrg * jlh;
            document.getElementById("cpo").innerHTML = hsl;
        });
        $("#filter_olin").click(function(){
        var hrg = $('#harga_olin').val();
        var jlh = $('#jlh_olin').val();
        var hsl= hrg * jlh;
            document.getElementById("olin").innerHTML = hsl;
        });

        $("#filter_pko").click(function(){
        var hrg = $('#harga_pko').val();
        var jlh = $('#jlh_pko').val();
        var hsl= hrg * jlh;
            document.getElementById("pko").innerHTML = hsl;
        });

        $("#filter_bulking").click(function(){
        var hrg = $('#harga_bulking').val();
        var jlh = $('#jlh_bulking').val();
        var hsl= hrg * jlh;
            document.getElementById("bulking").innerHTML = hsl;
        });

        

    </script>
@endsection

@endsection
