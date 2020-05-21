@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Prinout Transaksi Smart')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <h4 class="page-title">Home</h4>
            </div>
        </div>
    </div>  
    <!-- end page title -->
    {{-- <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-haeder bg-default">
                    <div class="row pb-2 pt-2 pl-1 d-flex justify-content-start">
                        <div class="col-12">
                            <a href="{{ route('incoming_transaction') }}" class="btn btn-md btn-success"><i class="dripicons-list"></i> Kembali</a>
                             <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print Out</b></button>
                        </div>
                    </div>
                </div>
                <div class="card-body printableArea">
                    <div class="row">
                        <div class="col-lg-12 text-center"> 
                            <table  align="center" class="table-responsive" style="width: 100%">
                                <tr>
                                    <td style="padding-left: 5px"><img src="/img/polado.png" alt="" width="100px" height="70px"></td>
                                    <td align="center" style="width: 900px;padding-right: 20px">
                                            <font size="3"><b>PT.FOLADO KARYA ABADI</b></font><br>
                                            <font size="2">Kantor : Jalan Raya Pelabuhan Keluarahan Belawan II  <br>
                                                            Telepon. 0811 - 635 - 7007<br>
                                                        Email : Folado_Company@gmail.com</font>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table" style="width: 100%">
                                    <tr class="">
                                        <td colspan="3" style="font-size: 18pt;padding-right: 20px;padding-bottom: 20px"><b>Form Data Masuk Kendaaraan PT.Smart Bulking</b></td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">No</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>{{ $trsmart->no }}</td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">No.Ticket</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>{{ $trsmart->ticket }}</td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">No.Kendaraan</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>{{ $trsmart->trucks->no_kendaraan }}</td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">Langsung</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->p_langsung) }}</td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">Bulking</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->p_bulking) }}</td>
                                    </tr>
                                    <tr class="">
                                        <td style="font-size: 12pt;width: 100px;">Pendapatan</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->pendapatan) }}</td>
                                    </tr>
                                    <tr class="mt-2">
                                        <td style="font-size: 12pt;width: 100px;">Pendatan Bermalam</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->bermalam) }}</td>
                                    </tr>
                                    <tr class="mt-2">
                                        <td style="font-size: 12pt;width: 100px;">Barcode</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 100px;">{!! $barcode !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row pb-2 pt-2 pl-1 d-flex justify-content-start">
                        <div class="col-12">
                            <a href="{{ route('incoming_transaction') }}" class="btn btn-md btn-success"><i class="dripicons-list"></i> Kembali</a>
                             <button  class="btn btn-md btn-info ml-1" id="print2"><i class=" dripicons-print"></i><b> Print Out</b></button>
                        </div>
                    </div>

                    <div class="row">
                       <div class="printableArea2" style="width: 13cm;height: 15cm">
                        <div class="col-lg-12 text-center table-border"> 
                            <table class="table-responsive pb-3 border">
                                <tr>
                                    <td style="padding-left: 5px"><img src="/img/polado.png" alt="" width="100px" height="70px"></td>
                                    <td align="center" style="width: 900px;padding-right: 20px">
                                            <font size="3"><b>PT.FOLADO KARYA ABADI</b></font><br>
                                            <font size="2">Kantor : Jalan Raya Pelabuhan Keluarahan Belawan II  <br>
                                                            Telepon. 0811 - 635 - 7007<br>
                                                        Email : Folado_Company@gmail.com</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center"><h3>Barcode Kendaraan Masuk</h3></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center">{!! $barcode !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center"><h5>{{ $trsmart->trucks->no_kendaraan }}</h5></td>
                                </tr>
                            </table>
                            <p style="font-size: 20pt"></p>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<div class="row">
       <div class="col-12">
        <div class="card">
            <div class="card-header bg-default">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('incoming_transaction') }}" class="btn btn-md btn-success"><i class="dripicons-list"></i> Kembali</a>
                         <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print Out</b></button>
                    </div>
                </div>
            </div>
            <div class="card-body printableArea">
                <div class="row">
                    <div class="col-5">
                        <table class="table-responsive pb-3 pt-1 border" style="height: 11cm">
                            <tr>
                                <td style="padding-left: 5px"><img src="/img/polado.png" alt="" width="100px" height="70px"></td>
                                <td align="center" style="width: 900px;padding-right: 20px">
                                        <font size="3"><b>PT.FOLADO KARYA ABADI</b></font><br>
                                        <font size="1">Kantor : Jalan Raya Pelabuhan Keluarahan Belawan II  <br>
                                                        Telepon. 0811 - 635 - 7007<br>
                                                    Email : Folado_Company@gmail.com</font>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center"><h3>Barcode Kendaraan Keluar</h3></td>
                            </tr>
                            <tr class="pt-2">
                                <td colspan="2" style="text-align: center;padding-top: 10px">{!! $barcode !!}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;padding-top: 10px"><h5>{{ $trsmart->trucks->no_kendaraan }}</h5></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6 border" style="width: 17cm;height: 11cm">
                        <div class="row">
                            <table  align="center" class="table-responsive pt-1" style="width: 100%">
                                <tr>
                                    <td style="padding-left: 5px"><img src="/img/polado.png" alt="" width="100px" height="70px"></td>
                                    <td align="center" style="width: 900px;padding-right: 20px">
                                            <font size="3"><b>PT.FOLADO KARYA ABADI</b></font><br>
                                            <font size="2">Kantor : Jalan Raya Pelabuhan Keluarahan Belawan II  <br>
                                                            Telepon. 0811 - 635 - 7007<br>
                                                        Email : Folado_Company@gmail.com</font>
                                    </td>
                                </tr>
                                <tr><td colspan="3"><hr></td></tr>
                                <tr><td colspan="3" style="text-align: center"><h3>Form Kwitansi</h3></td></tr>
                            </table>
                        </div>
                        <div class="row mt-1">
                            <table class="" style="width: 100%">
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">No</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>{{ $trsmart->no }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">No.Ticket</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>{{ $trsmart->ticket }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">No.Kendaraan</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>{{ $trsmart->trucks->no_kendaraan }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Jenis Surat</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>{{ $trsmart->typemail->nama }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Langsung</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->p_langsung) }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Bulking</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->p_bulking) }}</td>
                                </tr>
                                <tr class="">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Biaya Pembayaran</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->pendapatan) }}</td>
                                </tr>
                                <tr class="mt-2">
                                    <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Biaya Bermalam</td>
                                    <td style="width: 20px">:</td>
                                    <td style="width: 100px;"><b>Rp.{{ number_format($trsmart->bermalam) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div> 
</div>

@section('printout')
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
        $(document).ready(function() {
            $("#print2").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea2").printArea(options);
            });
        });
    </script>
@endsection

@endsection
