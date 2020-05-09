@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Transaksi Keluar')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Transaksi Pengeluaran</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-2 col-lg-3">
            <div class="card title-box">
                <div class="card-body">
                        <h6 class="text-uppercase mt-0">Jumlah Pengeluaran</h6>
                        <h4 class="my-2" id="active-users-count">Rp.{{ number_format($number) }}</h4>
                        <p class="mb-0 text-muted">
                            <span class="text-nowrap">/ Pengeluaran</span>  
                        </p>
                </div>
            </div>
        </div>

        <div class="col-xl-10 col-lg-9">
            <div class="card card-ouline-light">
                @can('add transaction')
                <div class="card-header bg-default">
                    <button  class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_pengeluaran"><i class="uil-plus-square"></i> Tambah Data</button>
                </div>
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pengeluaran (Rp.)</th>
                                    <th>Keterangan</th>
                                    <th>Dibuat</th>
                                    @can('add transaction')
                                    <th>Tindakan</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($troutgoing as $item)
                                        <tr>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            @can('add transaction')
                                            <td class="row">
                                                <div class="mr-1 mb-1">
                                                    <a href="/edit/transaction_outgoing/{{$item->id}}" class="btn btn-md btn-warning" data-toggle="tooltip" data-placement="right" title="Edit"><i class="uil-edit"></i></a>
                                                </div>
                                                <div class="mr-1 mb-1">
                                                    <a href="/delete/transaction_outgoing/{{$item->id}}" class="btn-md btn btn-danger"  onclick="return confirm('Yakin Data Akan Dihapus ?')"  data-toggle="tooltip" data-placement="right" title="Hapus"><i class="uil-prescription-bottle"></i></a>               
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

{{-- modal --}}
<div class="modal fade" id="add_pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi Pengeluaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('create-transaction-outgoing') }}" method="POST" >
              {{ csrf_field() }}
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">No.</label>
                                <div class="input-group">                                    
                                    <input type="number" class="form-control" name="no" value="{{ $no_terakhir ? $no_terakhir->no + 1 : '1'  }}">
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Pengeluaran (Rp.)</label>
                                <div class="input-group">                                    
                                    <input type="number" class="form-control" name="jumlah">
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <div class="input-group">
                                   <textarea name="keterangan" id="" cols="" rows="5" class="form-control"></textarea>
                                </div>                         
                            </div>
                        </div>
                </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>

            </form>
        </div>
      </div>
    </div>
</div>

@section('datatable-tr')
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
<script src="assets/js/vendor/apexcharts.min.js"></script>
<!-- Todo js -->
<script src="assets/js/ui/component.todo.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>

        <!-- demo app -->
<script src="assets/js/pages/demo.dashboard-crm.js"></script>
<!-- demo app -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
{{-- <script>
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
</script> --}}

@endsection

@endsection
