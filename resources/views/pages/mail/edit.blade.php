@extends('partials.app')
@section('content')
@section('title', 'Modul Klasifikasi Surat | Edit Data')


<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jenis Surat</a></li>
                        <li class="breadcrumb-item active">Update Data Surat</li>
                    </ol>
                </div>
                <h4 class="page-title"> Update Data Jenis Surat</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row pb-2">
        <div class="col-md-4">
            <a href="{{ route('TypeMail') }}" class="btn btn-success btn-md"><i class=" uil-left-indent-alt"></i> Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-ouline-warning">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Update Data</h4>
                </div>
                <div class="card-body">
                    <form action="/edit/type_mails/{$item->id}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-md-12">
    
                                <div class="form-group">
                                    <label for="">Jenis Surat</label>
                                    <div class="input-group">                                    
                                        <input type="text" class="form-control" name="nama" value="{{ $typemail->nama }}">
                                      </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Perusahaan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="perusahaan" value="{{ $typemail->perusahaan }}">
                                    </div>                         
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 justify-content-start">
                                    <button type="submit" class="btn btn-warning text-white">Update Data</button>
                                </div>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection