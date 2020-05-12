@extends('partials.app')
@section('content')
@section('title', 'Laporan Transaksi Masuk')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                        <li class="breadcrumb-item active">Transaksi Masuk</li>
                    </ol>
                </div>
                <h4 class="page-title">Laporan Transaksi Masuk</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-ouline-default">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#multi-item-preview" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Transaksi PT.Smart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#multi-item-code" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Transaksi PT.phg
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="multi-item-preview">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Start Date :</label>
                                        <div class="input-group input-daterange">
                                            <input type="text" class="form-control form-control-default"name="from_date" id="from_date">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">End Date :</label>
                                        <div class="input-group input-daterange">
                                            <input type="text" class="form-control form-control-default" name="to_date" id="to_date">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-3 pb-1">
                                            <button class="btn btn-md btn-primary" id="filter" name="filter"><i class="mdi mdi-autorenew"></i> Refresh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="multi-item-code">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Start Date :</label>
                                        <div class="input-group input-daterange">
                                            <input type="text" class="form-control form-control-default" name="from_date1" id="from_date1">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info border-info text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">End Date :</label>
                                        <div class="input-group input-daterange">
                                            <input type="text" class="form-control form-control-default"  name="to_date1" id="to_date1">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-info border-info text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-3 pb-1">
                                            <button class="btn btn-md btn-info" name="filter1" id="filter1"><i class="mdi mdi-autorenew"></i> Refresh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

   
</div>

@section('report-incoming')
<!-- third party js -->
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
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
        });

        load_data();
    
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
</script>
<script>
     $(document).ready(function(){
            $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
            });
        });

     $("#filter1").click(function(){
        var from_date1 = $('#from_date1').val();
        var to_date1 = $('#to_date1').val();
                if(from_date1 != '' &&  to_date1 != '') {
                    $('#phg').DataTable().destroy();
                    load_phg(from_date1, to_date1);
                } else {
                    alert('Both Date is required');
                }
        });

    load_phg();
    
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
</script>

        
@endsection

@endsection
