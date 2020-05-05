@extends('partials.app')
@section('content')
@section('title', 'Modul Forum | Edit Forum')


<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Update</a></li>
                        <li class="breadcrumb-item active">Modul Forum</li>
                    </ol>
                </div>
                <h4 class="page-title">Update Data Forum </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="text-white">Update Data</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" >
                    {{ csrf_field() }}
                      <div class="row row-pendapatan">
                              <div class="col-md-12">
      
                                  <div class="form-group">
                                      <label for="">Tanggal</label>
                                      <div class="input-group input-daterange">                                    
                                          <input type="text" class="form-control" name="tanggal" value="{{ $forum->tanggal }}">
                                        </div>
                                  </div>
      
                                  <div class="form-group">
                                      <label for="">Total Kendaraan Masuk</label>
                                      <div class="input-group">                                    
                                          <input type="text" class="form-control" name="total_kendaraan" value="{{ $forum->total_kendaraan }}">
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
                                              <input type="text" class="form-control jlh_kwitansi" value="">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <label for="">Kwitansi</label>
                                              <div class="input-group">                                    
                                              <input type="text" class="form-control kwitansi" name="kwitansi" value="{{ $forum->kwitansi }}">
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
                                              <input type="text" class="form-control jlh_mandor" value="">
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
                                                  <input type="text" class="form-control jlh_acit" value="" disabled>
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
                                                  <input type="text" class="form-control jlh_acit"  value="" disabled>
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
                                                  <input type="text" class="form-control jlh_acit"value="" disabled>
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
                                                  <input type="text" class="form-control jlh_acit" value="" disabled>
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
                                                  <input type="text" class="form-control jlh_acit" name="" value="" disabled>
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
                                                  <input type="text" class="form-control jlh_bpjs" name="" value="">
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
                            <a href="{{ url('/forum') }}" class="btn btn-md bg-success text-white">Kembali</a>
                            <button type="submit" class="btn btn-warning">Update Data</button>
                          </div>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection