@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Transaksi Masuk')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row mb-2">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Transaksi Pendapatan</h4>
            </div>

        </div>
    </div>
    <!-- end page title -->
    {{-- <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('add-setoran') }}" class="btn btn-info btn-rounded mb-3"><i class="mdi mdi-printer-check"></i> Tutup Kasir Setoran</a>
                    <a href="" class="btn btn-success btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Forum</a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    {{-- <a href="{{ route('print-setoran-shift1') }}" class="btn btn-primary btn-rounded mb-3"><i class="mdi mdi-printer-check"></i> Tutup Kasir Setoran (Shift 1)</a>
                    <a href="{{ route('print-setoran-shift2') }}" class="btn btn-primary btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Setoran (Shift 2)</a>
                    <a href="{{ route('print-forum-shift1') }}" class="btn btn-info btn-rounded mb-3"><i class="mdi mdi-printer-check"></i> Tutup Kasir Forum (Shift 1)</a>
                    <a href="{{ route('print-forum-shift2') }}" class="btn btn-info btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir forum (Shift 2)</a> --}}
                   @role('admin satu')
                   <a href="{{ route('tutup-kasir1') }}" class="btn btn-success btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Shift1</a>
                   @elserole('super admin')
                   <a href="{{ route('tutup-kasir1') }}" class="btn btn-success btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Shift1</a>
                   @endrole

                   @role('admin dua')
                    <a href="{{ route('tutup-kasir2') }}" class="btn btn-warning btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Shift2</a>
                    @elserole('super admin')
                    <a href="{{ route('tutup-kasir2') }}" class="btn btn-warning btn-rounded mb-3 ml-1"><i class="mdi mdi-printer-check"></i> Tutup Kasir Shift2</a>
                    @endrole
                
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one text-white">
                <div class="card-body bg-info">
                    <i class=' dripicons-cart float-right text-white'></i>
                    <h6 class="text-uppercase mt-0">Pendapatan ( PT.SMART )</h6>
                    <h2 class="my-2" id="active-users-count">Rp.{{ number_format($trsmart->sum('pendapatan')) }}</h2>
                    <p class="mb-0 text-muted">
                        <span class="text-white mr-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                        <span class="text-nowrap text-white">Transaction</span>

                    </p>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one text-white">
                <div class="card-body bg-success">
                    <i class=' dripicons-cart float-right'></i>
                    <h6 class="text-uppercase mt-0">Pendapatan ( Pt.Phg )</h6>
                    <h2 class="my-2" id="active-users-count">Rp. {{ number_format($trphg->sum('pendapatan'),0) }}</h2>
                    <p class="mb-0 text-muted">
                        <span class="text-white mr-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                        <span class="text-nowrap text-white">Transaction</span>
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card tilebox-one text-white">
                <div class="card-body bg-danger">
                    <i class='dripicons-shopping-bag float-right'></i>
                    <h6 class="text-uppercase mt-0">Total Kendaraan Masuk</h6>
                    <h2 class="my-2" id="active-users-count">{{ $truksmart + $trukphg }}</h2>
                    <p class="mb-0 text-muted">
                        <span class="text-white mr-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                        <span class="text-nowrap text-white">in vehicle</span>  
                    </p>
                </div> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
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
                            <div class="row pb-3">
                                @can('add transaction')
                                <div class="col-lg-12">
                                    <a href="{{ route('create-smart') }}" class="btn btn-md btn-primary"><i class="uil-plus-square"></i> Tambah</a>
                                    
                                    @role('admin satu')
                                    <a href="{{ route('smart-rekapan-shift1') }}" class="btn btn-md btn-success"><i class="uil-files-landscapes-alt"></i> Rekapan Shift1</a>
                                    @elserole('super admin')
                                    <a href="{{ route('smart-rekapan-shift1') }}" class="btn btn-md btn-success"><i class="uil-files-landscapes-alt"></i> Rekapan Shift1</a>
                                    @endrole


                                    @role('admin dua')
                                     <a href="{{ route('smart-rekapan-shift2') }}" class="btn btn-md btn-warning text-white"><i class="uil-files-landscapes-alt"></i> Rekapan Shift2</a>
                                    @elserole('super admin')
                                    <a href="{{ route('smart-rekapan-shift2') }}" class="btn btn-md btn-warning text-white"><i class="uil-files-landscapes-alt"></i> Rekapan Shift2</a>
                                     @endrole
                                </div>
                                @endcan
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>No.ticket</th>
                                                <th>No.Kendaraan</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Jenis Surat</th>
                                                <th>Line Pendapatan</th>

                                                @role('admin dua')
                                                <th>Pendapatan Bermalam</th>
                                                @elserole('super admin')
                                                <th>Pendapatan Bermalam</th>
                                                @endrole

                                                @can('add transaction')
                                                <th>Tindakan</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($trsmart as $item)
                                                <tr>
                                                    <td>{{ $item->no }}</td>
                                                    <td>{{ $item->ticket }}</td>
                                                    <td>{{ $item->trucks->no_kendaraan }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam }}</td>
                                                    <td>{{ $item->typemail->nama }}</td>
                                                    <td>{{ $item->pendapatan }}</td>
                                                    @role('admin dua')
                                                    <td>{{ $item->bermalam }}</td>
                                                    @elserole('super admin')
                                                    <td>{{ $item->bermalam }}</td>
                                                    @endrole
                                                    @can('add transaction')
                                                    <td class="row">
                                                        <div class="mr-1 mb-1">
                                                            <a href="/edit/transaction_smart/{{$item->id}}" class="btn btn-md btn-warning" data-toggle="tooltip" data-placement="right" title="Edit"><i class="uil-edit"></i></a>
                                                        </div>
                                                        <div class="mr-1 mb-1">
                                                            <a href="/delete/transaction_smart/{{$item->id}}" class="btn-md btn btn-danger" onclick="return confirm('Yakin Data Akan Dihapus ?')" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="uil-prescription-bottle"></i></a>               
                                                        </div>
                                                        @can('add night income')
                                                        <div class="mr-1 mb-1">
                                                            <a href="/add_overnight/transaction_smart/{{$item->id}}" class="btn-md btn btn-success"  data-toggle="tooltip" data-placement="right" title="Tambah data bermalam"><i class="uil-money-withdraw"></i></a>               
                                                        </div>
                                                        @endcan
                                                        <div class="mr-1 mb-1">
                                                            <a href=" /print_out/transaction_smart/{{$item->id}}" class="btn-md btn btn-info" data-id="{{$item->id}}"  data-toggle="tooltip" data-placement="right" title="Cetak Data Peritem"><i class=" uil-print"></i></a>               
                                                        </div>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>  
                                </div> 
                               </div>
                            </div>                                      
                        </div>
                        
                        <div class="tab-pane" id="multi-item-code">
                            <div class="row pb-3">
                                @can('add transaction')
                                <div class="col-md-12">
                                    <a href="{{ route('create-phg') }}" class="btn btn-md btn-primary"><i class="uil-plus-square"></i> Tambah</a>

                                    @role('admin satu')
                                    <a href="{{ route('phg-rekapan-shift1') }}" class="btn btn-md btn-success"><i class="uil-files-landscapes-alt"></i> Rekapan Shift1</a>
                                    @elserole('super admin')
                                    <a href="{{ route('phg-rekapan-shift1') }}" class="btn btn-md btn-success"><i class="uil-files-landscapes-alt"></i> Rekapan Shift1</a>
                                    @endrole
                                    
                                    @role('admin dua')
                                    <a href="{{ route('phg-rekapan-shift2') }}" class="btn btn-md btn-warning text-white"><i class="uil-files-landscapes-alt"></i> Rekapan Shift2</a>
                                    @elserole('super admin')
                                    <a href="{{ route('phg-rekapan-shift2') }}" class="btn btn-md btn-warning text-white"><i class="uil-files-landscapes-alt"></i> Rekapan Shift2</a>
                                    @endrole
                                </div>
                                @endcan
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tiket</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>No.Kendaraan</th>
                                                    <th>Jenis Surat</th>
                                                    <th>Pendapatan</th>
                                                    @role('admin dua')
                                                    <th>Bermalam</th>
                                                    @elserole('super admin')
                                                    <th>Bermalam</th>
                                                    @endrole
                                                    @can('add transaction')
                                                    <th>Tindakan</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @forelse ($trphg as $item)
                                                   <tr>
                                                       <td>{{ $item->no }}</td>
                                                       <td>{{ $item->ticket }}</td>
                                                       <td>{{ $item->tanggal }}</td>
                                                       <td>{{ $item->jam }}</td>
                                                       <td>{{ $item->trucks->no_kendaraan }}</td>
                                                       <td>{{ $item->typemail->nama }}</td>
                                                       <td>{{ $item->pendapatan }}</td>
                                                       @role('admin dua')
                                                       <td>{{ $item->bermalam }}</td>
                                                       @elserole('super admin')
                                                       <td>{{ $item->bermalam }}</td>
                                                       @endrole
                                                       @can('add transaction')
                                                       <td class="row">
                                                        <div class="mr-1 mb-1">
                                                            <a href="/edit/transaction_phg/{{$item->id}}" class="btn btn-md btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="uil-edit"></i></a>
                                                        </div>
                                                        <div class="mr-1 mb-1">
                                                            <a href="/delete/transaction_phg/{{$item->id}}" class="btn-md btn btn-danger"  onclick="return confirm('Yakin Data Akan Dihapus ?')"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="uil-prescription-bottle"></i></a>               
                                                        </div>
                                                        @can('add night income')
                                                        <div class="mr-1 mb-1">
                                                            <a href="/add_overnight/transaction_phg/{{$item->id}}" class="btn-md btn btn-success"  data-toggle="tooltip" data-placement="bottom" title="Tambah data bermalam"><i class="uil-money-withdraw"></i></a>               
                                                        </div>
                                                        @endcan
                                                        <div class="mr-1 mb-1">
                                                            <a href="/print_out/transaction_phg/{{$item->id}}" class="btn-md btn btn-info"  data-toggle="tooltip" data-placement="bottom" title="Cetak Data Peritem"><i class=" uil-print"></i></a>               
                                                        </div>
                                                    </td>
                                                    @endcan
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
            </div>
        </div>
    </div>
</div>

@section('datatable-tr')
<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
<!-- third party js ends -->
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<!-- Todo js -->
<script src="{{ asset('assets/js/ui/component.todo.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>

        <!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard-crm.js') }}"></script>
<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({  
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

    $(function() {
            $('#trsmart').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('table-trsmart') !!}',
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'ticket', name: 'ticket' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'jam', name: 'jam' },
                    { data: 'p_langsung', name: 'p_langsung' },
                    { data: 'p_bulking', name: 'p_bulking' },
                    { data: 'pendapatan', name: 'pendapatan' },
                    { data: 'bermalam', name: 'bermalam' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false  }
                ]
            });
        });
        
</script>

@endsection

@endsection
