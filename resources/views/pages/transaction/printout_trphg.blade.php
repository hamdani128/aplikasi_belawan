@extends('partials.app')
@section('content')
@section('style')
<style>
    @media print {
        .xxx {
            background-color: red;
             width: 200px !important;
             height: 100px !important;
        }
    }
</style>
@stop
@section('title', 'Modul Transaksi | Print Out Phg')

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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row pb-2 pt-2 pl-1 d-flex justify-content-start">
                        <div class="col-12">
                            <a href="{{ route('incoming_transaction') }}" class="btn btn-md btn-success"><i class="dripicons-list"></i> Kembali</a>
                             <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print Out</b></button>
                        </div>
                    </div>

                    <div class="printableArea">
                        <div class="row">
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-lg-12 text-center table-border" style="width: 13cm;height: 20cm"> 
                                        <table class="table-responsive pb-5 pt-2 border">
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
                                            <tr class="mt-5">
                                                <td colspan="2" style="text-align: center">{!! $barcode !!}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center"><h5>{{ $trphg->trucks->no_kendaraan }}</h5></td>
                                            </tr>
                                        
                                        </table>
                                    </div>
                                 </div>
                            </div>
                            <div class="col-7 ">
                                <div class="row">
                                    <div class="col-lg-12 border" style="width: 16cm;height: 11cm"> 
                                        <table class="mt-2">
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
                                                <td colspan="2" style="text-align: center"><h3>Kwitansi</h3></td>
                                            </tr>
                                        </table> 
                                        <table>
                                            <tr style="text-align: justify">
                                                <td style="width: 270px;padding-left: 120px">No.</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>{{ $trphg->no }}</h6></td>
                                            </tr>
            
                                            <tr style="text-align: justify">
                                                <td style="width: 270px; padding-left: 120px">No.Ticket</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>{{ $trphg->ticket }}</h6></td>
                                            </tr>

                                            <tr style="text-align: justify">
                                                <td style="width: 270px;padding-left: 120px">No.Kendaraan</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>{{ $trphg->trucks->no_kendaraan }}</h6></td>
                                            </tr>

                                            <tr style="text-align: justify">
                                                <td style="width: 270px;padding-left: 120px">Type Surat</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>{{ $trphg->typemail->nama }}</h6></td>
                                            </tr>
                                            
                                            <tr style="text-align: justify">
                                                <td style="width: 270px;padding-left: 120px">Jumlah Pendapatan</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>Rp.{{ number_format($trphg->pendapatan) }}</h6></td>
                                            </tr>
                                            <tr style="text-align: justify">
                                                <td style="width: 270px;padding-left: 120px">Jumlah Bermalam</td>
                                                <td style="width: 40px;">:</td>
                                                <td style="width:200px;"><h6>Rp.{{ number_format($trphg->bermalam) }}</h6></td>
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
                         <table class="table-responsive pb-3 pt-1 border" style="height: 10cm">
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
                                 <td colspan="2" style="text-align: center;padding-top: 10px"><h5>{{ $trphg->trucks->no_kendaraan }}</h5></td>
                             </tr>
                         </table>
                     </div>
                     <div class="col-6 border" style="width: 17cm;height: 10cm">
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
                                     <td style="width: 100px;"><b>{{ $trphg->no }}</td>
                                 </tr>
                                 <tr class="">
                                     <td style="font-size: 12pt;width: 100px;padding-left: 1cm">No.Ticket</td>
                                     <td style="width: 20px">:</td>
                                     <td style="width: 100px;"><b>{{ $trphg->ticket }}</td>
                                 </tr>
                                 <tr class="">
                                     <td style="font-size: 12pt;width: 100px;padding-left: 1cm">No.Kendaraan</td>
                                     <td style="width: 20px">:</td>
                                     <td style="width: 100px;"><b>{{ $trphg->trucks->no_kendaraan }}</td>
                                 </tr>
                                 <tr class="">
                                     <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Jenis Surat</td>
                                     <td style="width: 20px">:</td>
                                     <td style="width: 100px;"><b>{{ $trphg->typemail->nama }}</td>
                                 </tr>
                                 <tr class="">
                                     <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Pendapatan</td>
                                     <td style="width: 20px">:</td>
                                     <td style="width: 100px;"><b>Rp.{{ number_format($trphg->pendapatan) }}</td>
                                 </tr>
                                 <tr class="mt-2">
                                     <td style="font-size: 12pt;width: 100px;padding-left: 1cm">Pendapatan Bermalam</td>
                                     <td style="width: 20px">:</td>
                                     <td style="width: 100px;"><b>Rp.{{ number_format($trphg->bermalam) }}</td>
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
