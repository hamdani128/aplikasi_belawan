@extends('partials.app')
@section('content')
@section('title', 'Dashboard')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Modul Setoran</a></li>
                        <li class="breadcrumb-item active">Add Setoran</li>
                    </ol>
                </div>
                <h4 class="page-title">Setoran</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card mb-0">
                            <div class="card-header bg-primary" id="headingOne">
                                <h5 class="m-0">
                                    <a class="custom-accordion-title d-block pt-2 pb-2 text-white"
                                        data-toggle="collapse" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Add Data Setoran
                                    </a>
                                </h5>
                            </div>
                    
                            <div id="collapseOne" class="collapse show"
                                aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
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
                                                                      <input type="text" class="form-control jlh_acit" disabled value="{{ $acit_total }}">
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
                                                                      <input type="text" class="form-control jlh_acit"  disabled value="{{ $bulking_total }}">
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
                                                                      <input type="text" class="form-control jlh_acit" disabled value="{{ $pko_total }}">
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
                                                                      <input type="text" class="form-control jlh_acit"  disabled  value="{{ $olin_total }}">
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
                                                                      <input type="text" class="form-control jlh_acit" name="" disabled  value="{{ $sub_cpo }}">
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
                                                                    <input type="text" class="form-control jlh_acit" name="" disabled value="{{ $INTI_total1 }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="">INTI</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control acit cpo" name="inti">
                                                                </div>
                                                            </div>
                                                        </div>                         
                                                    </div>
                          
                                                      <div class="form-group">
                                                          <label for="">Pendapatan Bermalam</label>
                                                          <div class="input-group">                                    
                                                              <input type="text" class="form-control" name="total_malam" >
                                                            </div>
                                                      </div>
                          
                                                      <div class="form-group">
                                                          <label for="">Total Pendapatan</label>
                                                          <div class="input-group">                                    
                                                              <input type="text" class="form-control jlh_pendapatan" name="total_pendapatan" value="{{ $total_pendapatan }}">
                                                            </div>
                                                      </div>
                          
                                                      <div class="form-group">
                                                          <label for="">Pengeluaran</label>
                                                          <div class="input-group">                                    
                                                              <input type="text" class="form-control" name="total_pengeluaran" value="{{ $keluar }}">
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
                        <div class="card mb-0">
                            <div class="card-header bg-info" id="headingTwo">
                                <h5 class="m-0">
                                    <a class="custom-accordion-title collapsed d-block pt-2 pb-2 text-white"
                                        data-toggle="collapse" href="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Informasi Data Setoran
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
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
        </div>
    </div>
    

</div>

@section('dashboard')
    <script>
        $(document).ready(function(){
            $('#perhari').click(function(){
                
            });
        });
    </script>
@endsection

@endsection
