@extends('partials.app')
@section('content')
@section('title', 'Modul Pembagian | Forum')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forum</a></li>
                        <li class="breadcrumb-item active">Pembagian</li>
                    </ol>
                </div>
                <h4 class="page-title">Forum Pt.Fulado Karya Abado</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <button  class="btn btn-info btn-md" data-toggle="modal" data-target="#add_forum"><i class="uil-plus-square"></i> Tambah Data</button>
                    </div>
                    <div class="row pt-2">
                        <div class="table-responsive">
                            <table id="forum" class="table dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Total Kendaraan</th>
                                        <th>Kwintansi</th>
                                        <th>Mandor</th>
                                        <th>Acit</th>
                                        <th>Pko</th>
                                        <th>Bulking</th>
                                        <th>Olin</th>
                                        <th>Cpo</th>
                                        <th>Bpjs</th>
                                        <th>tindakan</th>
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

<div class="modal fade" id="add_forum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Forum</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('create-forum') }}" method="POST" >
              {{ csrf_field() }}
                <div class="row row-pendapatan">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <div class="input-group input-daterange">                                    
                                    <input type="text" class="form-control" name="tanggal">
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="">Total Kendaraan Masuk</label>
                                <div class="input-group">                                    
                                    <input type="text" class="form-control" name="total_kendaraan" value="{{ $total_kendaraan }}">
                                  </div>
                            </div>

                            <div class="form-group">
                                <div class="row row-kwitansi">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control harga_kwitansi">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control jlh_kwitansi" value="{{ $total_kendaraan }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Kwitansi</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control kwitansi" name="kwitansi">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row row-mandor">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control harga_mandor">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control jlh_mandor" value="{{ $total_kendaraan }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Mandor</label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control mandor" name="mandor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row row-acit">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_acit">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_acit" value="{{ $total_acit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Acit</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control acit" name="acit">
                                        </div>
                                    </div>
                                </div>                         
                            </div>

                            <div class="form-group">
                                <div class="row row-acit">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_acit" name="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_acit"  value="{{ $total_bulking }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Bulking</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control acit bulking" name="bulking">
                                        </div>
                                    </div>
                                </div>                         
                            </div>

                            <div class="form-group">
                                <div class="row row-acit">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_acit">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_acit"value="{{ $total_pko }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">PKO</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control acit pko" name="pko">
                                        </div>
                                    </div>
                                </div>                         
                            </div>

                            <div class="form-group">
                                <div class="row row-acit">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_acit" >
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_acit" value="{{ $total_olin }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Olin</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control acit olin" name="olin">
                                        </div>
                                    </div>
                                </div>                         
                            </div>

                            <div class="form-group">
                                <div class="row row-acit">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_acit" name="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_acit" name="" value="{{ $total_cpo }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">CPO</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control acit cpo" name="cpo">
                                        </div>
                                    </div>
                                </div>                         
                            </div>

                            <div class="form-group">
                                <div class="row row-bpjs">
                                    <div class="col-4">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control harga_bpjs" name="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Jumlah</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jlh_bpjs" name="" value="14" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Bpjs</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control bpjs" name="bpjs">
                                        </div>
                                    </div>
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

@section('forum')
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
    <script>
        $(function() {
            $('#forum').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/forum/table',
                columns: [
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'total_kendaraan', name: 'total_kendaraan' },
                    { data: 'kwitansi', name: 'kwitansi' },
                    { data: 'mandor', name: 'mandor' },
                    { data: 'acit', name: 'acit' },
                    { data: 'bulking', name: 'bulking' },
                    { data: 'pko', name: 'pko' },
                    { data: 'olin', name: 'olin' },
                    { data: 'cpo', name: 'cpo' },
                    { data: 'bpjs', name: 'bpjs' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false  }
                ]
            });
        });
        
         $(document).ready(function(){
            $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
            });
        });
        
        $('.harga_acit').on('keyup',(e)=>{
            let row = $(e.target).parents('.row-acit')
            let acit = 0
            let harga = row.find('.harga_acit').val()
            let jumlah = row.find('.jlh_acit').val()
            acit = harga * jumlah
            row.find('.acit').val(acit);
        })

        $('.harga_kwitansi').on('keyup',(e)=>{
            let row = $(e.target).parents('.row-kwitansi')
            let acit = 0
            let harga = row.find('.harga_kwitansi').val()
            let jumlah = row.find('.jlh_kwitansi').val()
            acit = harga * jumlah
            row.find('.kwitansi').val(acit);
        })

        $('.harga_mandor').on('keyup',(e)=>{
            let row = $(e.target).parents('.row-mandor')
            let acit = 0
            let harga = row.find('.harga_mandor').val()
            let jumlah = row.find('.jlh_mandor').val()
            acit = harga * jumlah
            row.find('.mandor').val(acit);
        })

        $('.harga_bpjs').on('keyup',(e)=>{
            let row = $(e.target).parents('.row-bpjs')
            let acit = 0
            let harga = row.find('.harga_bpjs').val()
            let jumlah = row.find('.jlh_bpjs').val()
            acit = harga * jumlah
            row.find('.bpjs').val(acit);
        })
    </script>
@endsection

@endsection
