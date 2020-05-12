@extends('partials.app')
@section('content')
@section('title', 'Modul Kendaraan')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kendaraan Truk</a></li>
                        <li class="breadcrumb-item active">Kendaraan</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Kendaraan</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
   
    <div class="row pb-2">
        <div class="col-md-4">
            <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_surat"><i class=" uil-plus-square"></i> Tambah</button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="kendaraan" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.Kendaraan</th>
                                    <th>Perusahan</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($typemail as $item)
                                    
                                @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak Ada Data</td>
                                        </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                   </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>

</div>

<div class="modal fade" id="add_surat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action=" {{ route('create-kendaraan') }}" method="POST" >
              {{ csrf_field() }}
                <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">No.Kendaraan</label>
                                <div class="input-group">                                    
                                    <input type="text" class="form-control" name="no_kendaraan">
                                  </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="perusahaan">
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


@section('datatable-truck')
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
<script>
    $(function() {
            $('#kendaraan').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('table-kendaraan') !!}',
                columns: [
                    { data: 'no_kendaraan', name: 'no_kendaraan' },
                    { data: 'perusahaan', name: 'perusahaan' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false  }
                ]
            });
        });
</script>

@endsection

@endsection
