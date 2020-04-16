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

    <div class="row page-titles pb-2">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-body">

                <div class="row pb-2 d-flex justify-content-end">
                    <a href="{{ route('incoming_transaction') }}" class="btn btn-md btn-success"><i class="dripicons-list"></i> Kembali</a>
                    <button  class="btn btn-md btn-info ml-1" id="print"><i class=" dripicons-print"></i><b> Print Out</b></button>
                </div>
                {{-- {{ DNS1D::getBarcodeHTML(rand(111,999), 'C39') }} --}}
                
                    <div class="printableArea xxx" style="display:block;">
                        <div class="row">
                            <div class="col-lg-12 text-center"> 
                                <table  align="center" class="table-responsive" style="width: 100%">
                                    <tr>
                                        <td style="padding-left: 80px"><img src="/img/polado.png" alt="" width="220px" height="160px"></td>
                                        <td align="center" style="width: 900px;padding-right: 20px">
                                                <font size="6"><b>PT.FOLADO KARYA ABADI</b></font><br>
                                                <font size="2">Kantor : Jalan Raya Pelabuhan Keluarahan Belawan II  <br>
                                                                Telepon. 0811 - 635 - 7007<br>
                                                            Email : Folado_Company@gmail.com</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><hr></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center;font-size: 22pt;"><b><u>Kwintansi</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="row">
                                   <div class="col-md-5 d-flex justify-content-start">
                                        <h5>Tanggal : {{ $trphg->tanggal }}</h5>
                                   </div>
                                   <div class="col-md-7 d-flex">
                                        <h5 class="ml-1">No.Tiket : {{ $trphg->ticket }} / </h5>
                                        <h5 class="ml-1"> No.{{ $trphg->no }}</h5>
                                   </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width: 200px">No.Kendaraan</td>
                                            <td style="width: 5px">:</td>
                                            <td><b>{{ $trphg->trucks->no_kendaraan }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 200px">Jenis Surat</td>
                                            <td  style="width: 5px">:</td>
                                            <td><b>{{ $trphg->typemail->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 200px">Pendapatan</td>
                                            <td  style="width: 5px">:</td>
                                            <td><b>Rp.{{ number_format($trphg->pendapatan) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 200px">Pendapatan Bermalam</td>
                                            <td  style="width: 5px">:</td>
                                            <td><b>Rp.{{ number_format($trphg->bermalam) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 200px">Pendapatan Bermalam</td>
                                            <td  style="width: 5px">:</td>
                                            <td>{!! $barcode !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right; width: 100%"><b>Belawan,  {{ date('Y-m-d') }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right;padding-right: 40px; width: 100%">Penerima</td>
                                    </tr>
                                    <tr style="height: 150px;">
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right;padding-right: 10px; width: 100%"><b><u>Fulado Karya Abadi</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
    </div>

    <div class="row">
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
                                    <td colspan="2" style="text-align: center"><h5>{{ $trphg->trucks->no_kendaraan }}</h5></td>
                                </tr>
                            </table>
                            <p style="font-size: 20pt"></p>
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
