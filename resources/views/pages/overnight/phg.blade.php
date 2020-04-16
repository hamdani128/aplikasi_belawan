@extends('partials.app')
@section('content')
@section('title', 'Modul Bermalam | PT.Phg')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
              
                <h4 class="page-title">Transaksi Data Bermalam ( PT.Phg )</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-2 col-lg-3">
            <div class="card title-box">
                <div class="card-body">
                        <h6 class="text-uppercase mt-0">Total Pendapatan Bermalam</h6>
                        <h4 class="my-2" id="active-users-count">Rp.{{ number_format($jumlah_now) }}</h4>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">Pt.Phg</span>  
                        </p>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-lg-9">
            <div class="card card-ouline-light">
                <div class="card-header bg-default">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="" class="mr-1">Start Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-light" id="dash-daterange">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="mdi mdi-calendar-range font-13"></i>
                                        </span>
                                    </div>
                                </div>

                                <label for="" class="mr-1 ml-1 pt-1">To Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-light" id="dash-daterange">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="mdi mdi-calendar-range font-13"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-group ml-1">
                                    <a href="javascript: void(0);" class="btn btn-primary">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.kendaraan</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($ovphg as $item)
                                <tr>
                                    <td>{{ $item->transaction_phg->trucks->no_kendaraan }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->created_at }}</td>
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

@section('over-smart')
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

<!-- third party js -->
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="assets/js/vendor/buttons.html5.min.js"></script>
<script src="assets/js/vendor/buttons.flash.min.js"></script>
<script src="assets/js/vendor/buttons.print.min.js"></script>
<script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
@endsection

@endsection