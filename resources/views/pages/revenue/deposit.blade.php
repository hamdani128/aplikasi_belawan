@extends('partials.app')
@section('content')
@section('title', 'Mudul Pembagian | Setoran')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setoran</a></li>
                        <li class="breadcrumb-item active">Revenue</li>
                    </ol>
                </div>
                <h4 class="page-title">Setoran PT.Fulado Karya Abadi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <button  class="btn btn-info btn-md" data-toggle="modal" data-target="#add_deposit"><i class="uil-plus-square"></i> Tambah Data</button>
                    </div>
                    <div class="row pt-2">
                        <div class="table-responsive">
                            <table id="deposit" class="table dt-responsive nowrap w-100">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Total Kendaraan</th>
                                        <th>Acit</th>
                                        <th>Bulking</th>
                                        <th>Pko</th>
                                        <th>Olin</th>
                                        <th>Cpo</th>
                                        <th>Total Pendapatan</th>
                                        <th>Total Pendapatan Bermalam</th>
                                        <th>Total Pengeluaran</th>
                                        <th>Aksi</th>
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

<div class="modal fade" id="add_deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Setoran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('create-deposit') }}" method="POST" >
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
                                <label for="">Pendapatan Bermalam</label>
                                <div class="input-group">                                    
                                    <input type="text" class="form-control" name="total_malam" value="{{ $total_malam }}">
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="">Total Pendapatan</label>
                                <div class="input-group">                                    
                                    <input type="text" class="form-control jlh_pendapatan" name="total_pendapatan">
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="">Pengeluaran</label>
                                <div class="input-group">                                    
                                    <input type="text" class="form-control" name="total_pengeluaran" value="{{ $total_pengeluaran }}">
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
@section('deposit')
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

        $(function() {
            $('#deposit').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/deposit/table',
                columns: [
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'total_kendaraan', name: 'total_kendaraan' },
                    { data: 'acit', name: 'acit' },
                    { data: 'bulking', name: 'bulking' },
                    { data: 'pko', name: 'pko' },
                    { data: 'olin', name: 'olin' },
                    { data: 'cpo', name: 'cpo' },
                    { data: 'total_malam', name: 'total_malam' },
                    { data: 'total_pendapatan', name: 'total_pendapatan' },
                    { data: 'total_pengeluaran', name: 'total_pengeluaran' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false  }
                ]
            });
        });

    </script>
@endsection
@endsection
