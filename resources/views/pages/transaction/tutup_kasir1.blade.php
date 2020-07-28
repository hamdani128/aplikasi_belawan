@extends('partials.app')
@section('content')
@section('title', 'Modul Tutup Kasir 1')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tutup Kasir</a></li>
                        <li class="breadcrumb-item active">Kasir 1</li>
                    </ol>
                </div>
                <h4 class="page-title">Tutup Kasir 1</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>Setoran</h5>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="form-input">
                            <label for="">PHG (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phg_setoran" value="{{ $CPO_total2 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">CPO SMART (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cpo_setoran" value="{{ $CPO_total1 + $Bulking_SMART1 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">INTI SMART (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inti_setoran" value="{{  $INTI }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">ACIT (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="acit_setoran" value="{{ $acit_total }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">OLIN (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="olin_setoran" value="{{ $olin_total }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">PKO (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="pko_setoran" value="{{ $pko_total }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">BULKING (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="bulking_setoran" value="{{ $bulking_total }}">
                            </div>
                        </div> 
                        <div class="form-input">
                            <label for="">BULKING KELUAR (JUMLAH MOTOR)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="bulking_keluar">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Pengeluaran </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="pengeluaran_setoran" value="{{ $keluar }}">
                            </div>
                        </div> 
                        <div class="form-input mt-1">
                            <div class="input-group">
                                <button class="btn btn-md btn-primary" id="setoran"><i class="mdi mdi-refresh"></i> Process</button>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>Forum</h5>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="form-input">
                            <label for="">KWITANSI (5000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="kwitansi_forum" value="{{ $CPO_total2 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">MANDOR (8000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="mandor_forum" value="{{ $CPO_total2 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">CPO (5000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cpo_forum" value="{{ $CPO_total2 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">ACIT (10000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="acit_forum" value="{{ $acit_total }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">OLIN (10000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="olin_forum" value="{{ $olin_total }}">
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="">PKO (10000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="pko_forum" value="{{ $pko_total }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">BULKING (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="bulking_forum" value="{{ $bulking_total }}">
                            </div>
                        </div> 
                        <div class="form-input">
                            <label for="">BPJS (10000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="bpjs_forum">
                            </div>
                        </div>
                        <div class="form-input mt-1">
                            <div class="input-group">
                                <button class="btn btn-md btn-primary" id="forum"><i class="mdi mdi-refresh"></i> Process</button>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Pembagian PHG</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-input">
                                <label for="">Total Kendaraan PHG</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="pembagian_total_kendaraan_phg" value="{{ $ken2 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang PP (5000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_pp" value="{{ $CPO_total2  * 5000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang PS (4000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_ps" value="{{ $CPO_total2 * 4000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">DISHUB (4000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="dishub" value="{{ $CPO_total2  * 4000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang SPTI (4000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_spti" value="{{ $CPO_total2  * 4000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang CPO / Bulking (25000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_cpo_bulking" value="{{ ($CPO_total2 + $bulking_total) * 25000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang PKO (30000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_pko" value="{{ $pko_total * 30000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang OLIN (30000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_olin" value="{{ $olin_total * 30000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang ACIT (30000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  id="uang_acit" value="{{ $acit_total * 30000 }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang Kartu  (2000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="" id="uang_kartu_phg" value="{{ $ken2 * 2000 }}">
                                </div>
                            </div>
                            <div class="form-input pt-2">
                                <button class="btn btn-md btn-primary" id="phg_pembagian"><i class="mdi mdi-refresh"></i> Process</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Pembagian Smart</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-input">
                                <label for="">Uang kartu INTI (5000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inti_kartu_smart" value="{{ ($Bulking_SMART2 + $CPO_total2) * 5000  }}">
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="">Uang Kartu CPO (2000)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cpo_kartu_smart" value="{{ ($Bulking_SMART1 + $CPO_total1) * 2000 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>Pendapatan dan Pengeluran</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                       <form action="{{ route('create-kasir1') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-input">
                            <label for="">Pendapatan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pemasukkan" id="pendapatan" value="{{ $total_pendapatan }}">
                            </div>
                        </div> 
                        <div class="form-input">
                            <label for="">Pengeluaran</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pengeluaran" id="pengeluaran" value="{{ $keluar }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Pengeluaran PHG</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="keluar_phg">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Pengeluaran SMART</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="keluar_smart">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Setoran</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="setoran" id="hasil1">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Forum</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="forum" id="hasil2">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">Sisa</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pendapatan_bersih" id="sisa">
                            </div>
                        </div> 
                        <div class="form-input mt-2">
                            <a href="#" class="btn btn-md btn-primary" id="dapat"><i class="mdi mdi-refresh"></i> Process</a>  
                            <button class="btn btn-md btn-info" type="submit"><i class="dripicons-plus"></i> Simpan</button>       
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Setoran dan Forum</h5>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <button class="btn btn-md btn-info" id="print"><i class="mdi mdi-printer"></i> Print</button>
                        </div>
                    </div>
                </div>
                <div class="card-body responsive printableArea">
                    <div class="col-md-12"> 
                        <div class="row">
                            <h5>Setoran</h5>
                            <div class="table-responsive">
                                <table id="deposit" class="table table-bordered dt-responsive nowrap w-100 table-responsive">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>PHG (15000)</th>
                                            <th>CPO SMART (15000)</th>
                                            <th>INTI SMART (15000)</th>
                                            <th>ACIT (15000)</th>
                                            <th>OLIN (15000)</th>
                                            <th>PKO (15000)</th>
                                            <th>BULKING (15000)</th>
                                            <th>Bulking klr (Jlh Motor)</th>
                                            <th>Pengeluaran</th>
                                            <th>Total Kesuluruhan</th>
                                            <th>Subtotal</th>
                                            <th>Bersih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ date('Y-m-d') }}</td>
                                                <td><h5 class="setoran_phg" id="setoran_phg"></h5></td>
                                                <td><h5 class="cpo_setoran" id="setoran_cpo"></h5></td>
                                                <td><h5 class="inti_setoran" id="setoran_inti"></h5></td>
                                                <td><h5 class="acit_setoran" id="setoran_acit"></h5></td>
                                                <td><h5 class="olin_setoran" id="setoran_olin"></h5></td>
                                                <td><h5 class="pko_setoran" id="setoran_pko"></h5></td>
                                                <td><h5 class="bulking_setoran" id="setoran_bulking"></h5></td>
                                                <td><h5 class="bulking_keluar" id="keluar_bulking"></h5></td>
                                                <td><h5 class="setoran_pengeluaran" id="keluar_setoran"></h5></td>
                                                <td><h5 class="total_setoran" id="total_setoran"></h5></td>
                                                <td><h5 class="subtotal_setoran" id="subtotal_setoran"></h5></td>
                                                <td><h5 class="bersih_setoran" id="bersih_setoran"></h5></td>
                                            </tr>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                        <div class="row">
                            <h5>Forum</h5>
                            <div class="table-responsive">
                                <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kwitansi (5000)</th>
                                            <th>Mandor (8000)</th>
                                            <th>CPO (5000)</th>
                                            <th>ACIT (5000)</th>
                                            <th>OLIN (10000)</th>
                                            <th>PKO (10000)</th>
                                            <th>Bulking (15000)</th>
                                            <th>BPJS (10000) /14 Orang</th>
                                            <th>Subtotal</th>
                                            <th>Bersih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ date('Y-m-d') }}</td>
                                                <td><h5 id="forum_kwitansi"></h5></td>
                                                <td><h5 id="forum_mandor"></h5></td>
                                                <td><h5 id="forum_cpo"></h5></td>
                                                <td><h5 id="forum_acit"></h5></td>
                                                <td><h5 id="forum_olin"></h5></td>
                                                <td><h5 id="forum_pko"></h5></td>
                                                <td><h5 id="forum_bulking"></h5></td>
                                                <td><h5 id="forum_bpjs"></h5></td>
                                                <td><h5 id="forum_subtotal"></h5></td>
                                                <td><h5 id="forum_bersih"></h5></td>
                                            </tr>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                        <div class="row">
                            <h4>Pembagaian PHG dengan Dengan Jenis Surat  : </h4>
                            @foreach ($data as $item)
                                <h5> .{{ $item->typemail->nama }}, </h5>
                            @endforeach
                            <div class="table-responsive">
                                <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>TANGGAL</th>
                                            <th>UANG PP (5000)</th>
                                            <th>UANG PS (4000)</th>
                                            <th>DISHUB (4000)</th>
                                            <th>UANG SPTI (4000)</th>
                                            <th>UANG CPO / BULKING (25000)</th>
                                            <th>UANG PKO (30000)</th>
                                            <th>UANG OLIN (30000)</th>
                                            <th>UANG ACIT (30000)</th>
                                            <th>UANG KARTU</th>
                                            <th>SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ date('Y-m-d') }}</td>
                                                <td><h5 id="bagi_uang_pp"></h5></td>
                                                <td><h5 id="bagi_uang_ps"></h5></td>
                                                <td><h5 id="bagi_dishub"></h5></td>
                                                <td><h5 id="bagi_spti"></h5></td>
                                                <td><h5 id="bagi_cpo_bulking"></h5></td>
                                                <td><h5 id="bagi_pko"></h5></td>
                                                <td><h5 id="bagi_olin"></h5></td>
                                                <td><h5 id="bagi_acit"></h5></td>
                                                <td><h5 id="bagi_uang_kartu"></h5></td>
                                                <td><h5 id="bagi_bersih"></h5></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Pembagian Smart </h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>TANGGAL</th>
                                                        <th>JUMLAH</th>
                                                        <th>SUBTOTAL KARTU INTI (5000)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>{{ date('Y-m-d') }}</td>
                                                            <td><h5 id="bagi_smart_inti_jumlah">{{ $Bulking_SMART2 + $CPO_total2 }}</h5></td>
                                                            <td><h5 id="bagi_uang_ps"></h5>{{ ($Bulking_SMART2 + $CPO_total2) * 5000 }}</td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>TANGGAL</th>
                                                        <th>JUMLAH</th>
                                                        <th>SUBTOTAL KARTU CPO (2000)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>{{ date('Y-m-d') }}</td>
                                                            <td><h5 id="bagi_smart_inti_jumlah">{{ $Bulking_SMART1 + $CPO_total1 }}</h5></td>
                                                            <td><h5 id="bagi_uang_ps"></h5>{{ ($Bulking_SMART1 + $CPO_total1) * 2000 }}</td>
                                                        </tr>
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
    </div>
</div>

@section('kasir1')
<script src="{{ asset('assets/js/jquery.PrintArea.js') }}" type="text/JavaScript"></script>
    <script>
        
        $(document).ready(function(){
            $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
            });
        });

        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var style = '@page { size: Letter landscape; }';
                var options = {
                    mode: mode,
                    popClose: close,
                };
                $("div.printableArea").printArea(options);
            });
        });

        $("#setoran").click(function(){
            var a1 = parseInt($('#phg_setoran').val());        
            var a2 = parseInt($('#cpo_setoran').val());        
            var a3 = parseInt($('#inti_setoran').val());        
            var a4 = parseInt($('#olin_setoran').val());        
            var a5 = parseInt($('#pko_setoran').val());        
            var a6 = parseInt($('#bulking_setoran').val());        
            var a7 = parseInt($('#bulking_keluar').val());
            var a8 = parseInt($('#pengeluaran_setoran').val());
            var a9 = parseInt($('#acit_setoran').val());

            var b1 = a1 * 15000;
            var b2 = a2 * 15000;
            var b3 = a3 * 15000;
            var b4 = a4 * 15000;
            var b5 = a5 * 15000;
            var b6 = a6 * 15000;
            var b7 = a9 * 15000;

            var has1 = b1+b2+b3+b4+b5+b6+a7+b7;
            var total_kendaraan = a1+a2+a3+a4+a5+a6+a9
            var sub =total_kendaraan * 15000;
            var bersih = sub - a8
            document.getElementById('setoran_phg').innerHTML = a1;
            document.getElementById('setoran_cpo').innerHTML = a2;
            document.getElementById('setoran_inti').innerHTML = a3;
            document.getElementById('setoran_olin').innerHTML = a4;
            document.getElementById('setoran_pko').innerHTML = a5;
            document.getElementById('setoran_bulking').innerHTML = a6;
            document.getElementById('keluar_bulking').innerHTML = a7;
            document.getElementById('keluar_setoran').innerHTML = a8;
            document.getElementById('setoran_acit').innerHTML = b7;
            document.getElementById('total_setoran').innerHTML = total_kendaraan;
            document.getElementById('subtotal_setoran').innerHTML = sub;
            document.getElementById('bersih_setoran').innerHTML = bersih;
        });

        $("#forum").click(function(){
            var c1 = parseInt($('#kwitansi_forum').val());        
            var c2 = parseInt($('#mandor_forum').val());        
            var c3 = parseInt($('#cpo_forum').val());        
            var c4 = parseInt($('#olin_forum').val());        
            var c5 = parseInt($('#pko_forum').val());        
            var c6 = parseInt($('#bulking_forum').val());        
            var c7 = parseInt($('#bpjs_forum').val());
            var c8 = parseInt($('#acit_forum').val());
            
            var d1 = c1 * 5000;
            var d2 = c2 * 8000;
            var d3 = c3 * 5000;
            var d4 = c4 * 10000;
            var d5 = c5 * 10000;
            var d6 = c6 * 15000;
            var d7 = c7 * 10000;
            var d8 = c8 * 10000;
            var has2 = d1+d2+d3+d4+d5+d6+d8
            var bersih = has2 - d7
            
            document.getElementById('forum_kwitansi').innerHTML = c1;
            document.getElementById('forum_mandor').innerHTML = c2;
            document.getElementById('forum_cpo').innerHTML = c3;
            document.getElementById('forum_olin').innerHTML = c4;
            document.getElementById('forum_pko').innerHTML = c5;
            document.getElementById('forum_bulking').innerHTML = c6;
            document.getElementById('forum_bpjs').innerHTML = c7;            
            document.getElementById('forum_acit').innerHTML = c8;            
            document.getElementById('forum_subtotal').innerHTML = has2;            
            document.getElementById('forum_bersih').innerHTML = bersih;            
        });

        $("#phg_pembagian").click(function(){
            var c1 = parseInt($('#uang_pp').val());        
            var c2 = parseInt($('#uang_ps').val());        
            var c3 = parseInt($('#dishub').val());        
            var c4 = parseInt($('#uang_spti').val());        
            var c5 = parseInt($('#uang_cpo_bulking').val());        
            var c6 = parseInt($('#uang_pko').val());        
            var c7 = parseInt($('#uang_olin').val());
            var c8 = parseInt($('#uang_acit').val());
            var c9 = parseInt($('#uang_kartu_phg').val());

            var hasil = c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9
            document.getElementById('bagi_uang_pp').innerHTML = c1;
            document.getElementById('bagi_uang_ps').innerHTML = c2;
            document.getElementById('bagi_dishub').innerHTML = c3;
            document.getElementById('bagi_spti').innerHTML = c4;
            document.getElementById('bagi_cpo_bulking').innerHTML = c5;
            document.getElementById('bagi_pko').innerHTML = c6;
            document.getElementById('bagi_olin').innerHTML = c7;            
            document.getElementById('bagi_acit').innerHTML = c8;            
            document.getElementById('bagi_uang_kartu').innerHTML = c9;            
            document.getElementById('bagi_bersih').innerHTML = hasil;            
        });

        $("#dapat").click(function(){
            var didapat = parseInt($('#pendapatan').val());
            var keluar = parseInt($('#pengeluaran').val());

            var a1 = parseInt($('#phg_setoran').val()) ;        
            var a2 = parseInt($('#cpo_setoran').val());        
            var a3 = parseInt($('#inti_setoran').val());        
            var a4 = parseInt($('#olin_setoran').val());        
            var a5 = parseInt($('#pko_setoran').val());        
            var a6 = parseInt($('#bulking_setoran').val());        
            var a7 = parseInt($('#bulking_keluar').val());
            var b1 = a1 * 15000;
            var b2 = a2 * 15000;
            var b3 = a3 * 15000;
            var b4 = a4 * 15000;
            var b5 = a5 * 15000;
            var b6 = a6 * 15000;
            var has1 = b1+b2+b3+b4+b5+b6+a7;
            $('#hasil1').val(has1);

            var c1 = parseInt($('#kwitansi_forum').val());        
            var c2 = parseInt($('#mandor_forum').val());        
            var c3 = parseInt($('#cpo_forum').val());        
            var c4 = parseInt($('#olin_forum').val());        
            var c5 = parseInt($('#pko_forum').val());        
            var c6 = parseInt($('#bulking_forum').val());        
            var c7 = parseInt($('#bpjs_forum').val());
            var d1 = c1 * 5000;
            var d2 = c2 * 8000;
            var d3 = c3 * 5000;
            var d4 = c4 * 10000;
            var d5 = c5 * 10000;
            var d6 = c6 * 15000;
            var d7 = c7 * 10000;
            var has2 = d1+d2+d3+d4+d5+d6+d7
            $('#hasil2').val(has2); 
            
            var n1 = parseInt($('#pembagian_total_kendaraan_phg').val());
            var n2 = parseInt($('#uang_pp').val());            
            var n3 = parseInt($('#uang_spti').val());            
            var n4 = parseInt($('#dishub').val());            
            var n5 = parseInt($('#uang_ps').val());            
            var n6 = parseInt($('#uang_cpo_bulking').val());            
            var n7 = parseInt($('#uang_olin').val());            
            var n8 = parseInt($('#uang_pko').val());            
            var n9 = parseInt($('#uang_acit').val());            
            var n10 = parseInt($('#uang_kartu_phg').val());            
            var keluar_phg =  n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9 + n10
            $('#keluar_phg').val(keluar_phg);

            var n11 = parseInt($('#inti_kartu_smart').val());            
            var n12 = parseInt($('#cpo_kartu_smart').val());
            var keluar_smart = n11 + n12            
            $('#keluar_smart').val(keluar_smart);
            var sisa = didapat - (keluar + keluar_phg + keluar_smart + has1 + has2);
            $('#sisa').val(sisa);
        });

       
    </script>
@endsection

@endsection
