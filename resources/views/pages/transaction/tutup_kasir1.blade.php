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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Setoran</h5>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="form-input">
                            <label for="">PHG (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phg_setoran" value="{{ $jlh_phg }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">CPO (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cpo_setoran" value="{{ $CPO_total2 }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">INTI (15000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inti_setoran" value="{{ $INTI_total }}">
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
                        <div class="form-input mt-1">
                            <div class="input-group">
                                <button class="btn btn-md btn-primary" id="setoran"><i class="mdi mdi-refresh"></i> Process</button>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Forum</h5>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="form-input">
                            <label for="">KWITANSI (5000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="kwitansi_forum" value="{{ $total_kendaraan }}">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">MANDOR (8000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="mandor_forum">
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="">CPO (5000)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cpo_forum" value="{{ $sub_cpo }}">
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
        <div class="col-lg-4">
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
                        <div class="form-input mt-1">
                            <div class="input-group">
                                <a href="#" class="btn btn-md btn-primary" id="dapat"><i class="mdi mdi-refresh"></i> Process</a>
                                <button class="btn btn-md btn-info ml-1" type="submit"><i class="dripicons-plus"></i> Simpan</button>
                            </div>
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
                <div class="card-body printableArea">
                    <div class="row">
                        <h5>Setoran</h5>
                        <div class="table-responsive">
                            <table id="deposit" class="table table-bordered dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>PHG (15000)</th>
                                        <th>CPO (15000)</th>
                                        <th>INTI (15000)</th>
                                        <th>OLIN (15000)</th>
                                        <th>PKO (15000)</th>
                                        <th>BULKING (15000)</th>
                                        <th>Bulking Keluar (Jlh Motor)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ date('Y-m-d') }}</td>
                                            <td><h5 class="setoran_phg" id="setoran_phg"></h5></td>
                                            <td><h5 class="cpo_setoran" id="setoran_cpo"></h5></td>
                                            <td><h5 class="inti_setoran" id="setoran_inti"></h5></td>
                                            <td><h5 class="olin_setoran" id="setoran_olin"></h5></td>
                                            <td><h5 class="pko_setoran" id="setoran_pko"></h5></td>
                                            <td><h5 class="bulking_setoran" id="setoran_bulking"></h5></td>
                                            <td><h5 class="bulking_keluar" id="keluar_bulking"></h5></td>
                                        </tr>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                    <div class="row">
                        <h5>Forum</h5>
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
                                            <td><h5 id="forum_kwitansi"></h5></td>
                                            <td><h5 id="forum_mandor"></h5></td>
                                            <td><h5 id="forum_cpo"></h5></td>
                                            <td><h5 id="forum_olin"></h5></td>
                                            <td><h5 id="forum_pko"></h5></td>
                                            <td><h5 id="forum_bulking"></h5></td>
                                            <td><h5 id="forum_bpjs"></h5></td>
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

@section('kasir1')
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

        $("#setoran").click(function(){
            var a1 = $('#phg_setoran').val();        
            var a2 = $('#cpo_setoran').val();        
            var a3 = $('#inti_setoran').val();        
            var a4 = $('#olin_setoran').val();        
            var a5 = $('#pko_setoran').val();        
            var a6 = $('#bulking_setoran').val();        
            var a7 = $('#bulking_keluar').val();
            var b1 = a1 * 15000;
            var b2 = a2 * 15000;
            var b3 = a3 * 15000;
            var b4 = a4 * 15000;
            var b5 = a5 * 15000;
            var b6 = a6 * 15000;
            var has1 = b1+b2+b3+b4+b5+b6+a7;
            document.getElementById('setoran_phg').innerHTML = b1;
            document.getElementById('setoran_cpo').innerHTML = b2;
            document.getElementById('setoran_inti').innerHTML = b3;
            document.getElementById('setoran_olin').innerHTML = b4;
            document.getElementById('setoran_pko').innerHTML = b5;
            document.getElementById('setoran_bulking').innerHTML = b6;
            document.getElementById('keluar_bulking').innerHTML = a7;

            document.getElementById('setoran_hasil').innerHTML = has1;


        });

        $("#forum").click(function(){
            var c1 = $('#kwitansi_forum').val();        
            var c2 = $('#mandor_forum').val();        
            var c3 = $('#cpo_forum').val();        
            var c4 = $('#olin_forum').val();        
            var c5 = $('#pko_forum').val();        
            var c6 = $('#bulking_forum').val();        
            var c7 = $('#bpjs_forum').val();
            var d1 = c1 * 5000;
            var d2 = c2 * 8000;
            var d3 = c3 * 5000;
            var d4 = c4 * 10000;
            var d5 = c5 * 10000;
            var d6 = c6 * 15000;
            var d7 = c7 * 10000;
            var has2 = d1+d2+d3+d4+d5+d6+d7
            document.getElementById('forum_kwitansi').innerHTML = d1;
            document.getElementById('forum_mandor').innerHTML = d2;
            document.getElementById('forum_cpo').innerHTML = d3;
            document.getElementById('forum_olin').innerHTML = d4;
            document.getElementById('forum_pko').innerHTML = d5;
            document.getElementById('forum_bulking').innerHTML = d6;
            document.getElementById('forum_bpjs').innerHTML = d7;

            document.getElementById('has_forum').innerHTML = has2;
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
            var sisa = didapat - (has1 + has2 + keluar)
            $('#hasil2').val(has2); 
            $('#sisa').val(sisa);



        });
    </script>
@endsection

@endsection
