@extends('partials.app')
@section('content')
@section('title', 'Modul Laporan | Laporan Pengeluaran')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                        <li class="breadcrumb-item active">Laporan Pengeluaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Laporan Transaksi Keluar</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-default">
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
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="keluar" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pengeluaran (Rp.)</th>
                                            <th>Keterangan</th>
                                            <th>Dibuat</th>
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

@section('outgoing')
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
                    $('#keluar').DataTable().destroy();
                    load_data2(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
        });

        load_data2();

        function load_data2(from_date = '', to_date = '') {
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
                    { data: 'created_at', name: 'created_at' },
                ]
            });
        }
    </script>
    
@endsection


@endsection
