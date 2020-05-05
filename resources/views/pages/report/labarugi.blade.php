@extends('partials.app')
@section('content')
@section('title', 'Modul Laporan | Laporan Line Total')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group mr-1">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control form-control-light" name="from_date" id="from_date">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-daterange">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" name="to_date" id="to_date">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ml-2" id="filter">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ml-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Laporan Line Total</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-5 col-lg-6">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Pendapatan Tr.Pt.Smart</h5>
                            <h3 class="mt-3 mb-3 text-success pensmart" id="pensmart">0</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Pendapatan</span>  
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Pendapatan Tr.Pt.Phg</h5>
                            <h3 class="mt-3 mb-3 text-success penphg" id="penphg">0</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Pendapatan</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Pengeluaran</h5>
                            <h3 class="mt-3 mb-3 text-danger penkeluar">0</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Pengeluaran</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Line Hasil Total</h5>
                            <h3 class="mt-3 mb-3 text-info hasil" id="hasil">0</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Hasil Total</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7  col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Perkembangan Pendapatan Bersih</h4>

                    <div id="high-performing-product" class="apex-charts"
                        data-colors="#727cf5,#e3eaef"></div>

                    <!-- <div style="height: 263px;" class="chartjs-chart">
                        <canvas id="high-performing-product"></canvas>
                    </div> -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Checkout Steps -->
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#billing-information" data-toggle="tab" aria-expanded="false"
                                class="nav-link rounded-0 active">
                                <i class="mdi mdi-calendar-multiple font-18"></i>
                                <span class="d-none d-lg-block">Pendapatan Transaksi PT.Smart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#shipping-information" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                <i class="mdi mdi-calendar-multiple font-18"></i>
                                <span class="d-none d-lg-block">Pendapatan Transaksi PT.Phg</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#payment-information" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                <i class="mdi mdi-cash-multiple font-18"></i>
                                <span class="d-none d-lg-block">Pengeluaran</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Steps Information -->
                    <div class="tab-content">

                        <!-- Billing Content-->
                        <div class="tab-pane show active" id="billing-information">
                            <div class="row">
                               <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="smart" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tiket</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>No.Kendaraan</th>
                                                <th>Jenis Surat</th>
                                                <th>langsung</th>
                                                <th>bulking</th>
                                                <th>pendapatan</th>
                                                <th>Bermalam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                </div><!-- end col -->            
                            </div> <!-- end row-->
                        </div>
                        <!-- End Billing Information Content-->

                        <!-- Shipping Content-->
                        <div class="tab-pane" id="shipping-information">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="phg" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Ticket</th>
                                                    <th>tanggal</th>
                                                    <th>jam</th>
                                                    <th>No.Kendaraan</th>
                                                    <th>Jenis Surat</th>
                                                    <th>pendapatan</th>
                                                    <th>bermalam</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->            
                            </div> <!-- end row-->
                        </div>
                        <!-- End Shipping Information Content-->

                        <!-- Payment Content-->
                        <div class="tab-pane" id="payment-information">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="keluar" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Pengeluaran (Rp.)</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->            
                            </div> <!-- end row-->
                        </div>
                        <!-- End Payment Information Content-->

                    </div> <!-- end tab content-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>

@section('labarugi')
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<!-- third party js -->
<script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->
<!-- demo app -->
<script src="/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="/assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="/assets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="/assets/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="/assets/js/vendor/buttons.html5.min.js"></script>
<script src="/assets/js/vendor/buttons.flash.min.js"></script>
<script src="/assets/js/vendor/buttons.print.min.js"></script>
<script src="/assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="/assets/js/vendor/dataTables.select.min.js"></script>
<script src="/assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script src="assets/js/pages/demo.dashboard.js"></script>
<script>
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
                    $('#smart').DataTable().destroy();
                    $('#phg').DataTable().destroy();
                    $('#keluar').DataTable().destroy();
                    load_data(from_date, to_date);
                    load_phg(from_date, to_date);
                    load_pengeluaran(from_date, to_date);
                    $.get('/report/sum-pendapatan/trsmart', {from_date:from_date, to_date:to_date}, function(data){
                        $(".pensmart").html(data );
                    });
                    $.get('/report/sum-pendapatan/trphg', {from_date:from_date, to_date:to_date}, function(data){
                        $(".penphg").html(data);
                    });

                    $.get('/report/sum-pengeluaran/trkeluar', {from_date:from_date, to_date:to_date}, function(data){
                        $(".penkeluar").html(data);
                    });

                    $.get('/report/hasil', {from_date:from_date, to_date:to_date}, function(data){
                        $(".hasil").html(data);
                    });

                } else {
                    alert('Both Date is required');
                }
        });

       

    load_data();
    load_phg();
   
    function load_data(from_date = '', to_date = '') {
            $('#smart').DataTable({
                processing: true,
                serverSide: true,
                "bSort": false,
                "responsive": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url  : '/report/table/smart',
                    data :{from_date:from_date, to_date:to_date}
                },
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'ticket', name: 'ticket' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'jam', name: 'jam' },
                    { data: 'trucks.no_kendaraan', name: 'trucks.no_kendaraan' },
                    { data: 'typemail.nama', name: 'typemail.nama' },
                    { data: 'p_langsung', name: 'p_langsung' },
                    { data: 'p_bulking', name: 'p_bulking' },
                    { data: 'pendapatan', name: 'pendapatan' },
                    { data: 'bermalam', name: 'bermalam' },
                  
                ]
            });
        }

        function load_phg(from_date = '', to_date = '') {
            $('#phg').DataTable({
                processing: true,
                serverSide: true,
                "bSort": false,
                "responsive": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url  : '/report/table/phg',
                    data :{from_date:from_date, to_date:to_date}
                },
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'ticket', name: 'ticket' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'jam', name: 'jam' },
                    { data: 'trucks.no_kendaraan', name: 'trucks.no_kendaraan' },
                    { data: 'typemail.nama', name: 'typemail.nama' },
                    { data: 'pendapatan', name: 'pendapatan' },
                    { data: 'bermalam', name: 'bermalam' },
                ]
            });
        }
        
        function load_pengeluaran(from_date = '', to_date = '') {
            $('#keluar').DataTable({
                processing: true,
                serverSide: true,
                "bSort": false,
                "responsive": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url  : '/report/table/outgoing',
                    data :{from_date:from_date, to_date:to_date}
                },
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'keterangan', name: 'keterangan' },
                ]
            });
        }

</script>
@endsection

@endsection
