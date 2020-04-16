@extends('partials.app')
@section('content')
@section('title', 'Modul Transaksi | Transaksi Phg')


<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi PT.Phg</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
                <h4 class="page-title"> Tambah Data Transaksi Pendapatan ( PT.Phg )</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row pb-2">
        <div class="col-md-4">
            <a href="{{ route('incoming_transaction') }}" class="btn btn-success btn-md"><i class="uil-layer-group"></i> View Info Transaction</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card card-ouline-warning">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Data Kendaraan</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('create-transaction-phg') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">No.Kendaraan</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" id="nokendaraan" name="no_kendaraan">
                                      </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Perusahaan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="perusahaan" id="perusahaan">
                                    </div>                         
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="col-sm-12 justify-content-start">
                                    <button type="submit" class="btn btn-primary text-white">Check Data</button>
                                    <button type="submit" class="btn btn-info text-white" disabled>Tambah Data</button>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-8">
            <div class="card card-ouline-warning">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Lengkapi Pembayaran Data</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No.</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" name="no" value="{{ $no_terakhir ? $no_terakhir->no + 1 : '1'  }}">
                                      </div>
                                      
                                      @error('no')
                                      <div class="text-danger mt-1">{{ $message }}</div>
                                      @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">No.Tiket</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" name="tiket">
                                      </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Surat</label>
                                <div class="input-group">
                                    <select name="surat_id" class="form-control" id="">
                                        <option value="">Pilih Data:</option>
                                        @foreach ($typemail as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Total Didapatkan</label>
                                <div class="input-group">                                    
                                    <input type="number" class="form-control" name="pendapatan" id="pendapatan" onkeyup="sum();">
                                  </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-12 justify-content-start">
                                    <button type="submit" class="btn btn-primary text-white">Simpan Data</button>
                                </div>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@section('phg')
    <script>
            $(function () {
                $('#nokendaraan').keydown(function (e) {
                    if(e.which == 13){
                        e.preventDefault()
                        var bk = $('#nokendaraan').val()
                        $.get( `/api/get-company/${bk}`)
                        .then(function (response) {
                            $('#perusahaan').val(response.data)
                            alert(response.message)
                        }).catch(function (e) {
                            alert('Data tidak ada')
                            $('#perusahaan').val("")
                        })
                    }
                })
            })
    </script>
@endsection

@endsection