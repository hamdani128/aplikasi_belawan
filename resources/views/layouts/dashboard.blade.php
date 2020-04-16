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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <h4 class="page-title">Home</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row page-titles pb-2">
        <div class="col-lg-12 text-center"> 
            <table  align="center" class="table-responsive" style="width: 100%">
                <tr>
                    <td style="padding-left: 80px"><img src="/img/polado.png" alt="" width="220px" height="160px"></td>
                    <td align="center" style="width: 1000px;padding-right: 120px">
                            <font size="24"><b>PT.FOLADO KARYA ABADI</b></font><br><br>
                            <font size="2">Kantor : Jalan Kapten Maulana Lubis No.1 Medan Kode Pos 20112<br>
                                              Telepon. (061) 4537728 Faks.(061) 4537728<br>
                                        Email : Folado_Company@gmail.com  Website: www.millennialtechnology.co.id</font>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-header bg-default">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="#" id="perhari" class="dropdown-item perhari">Today</a>
                            <!-- item-->
                            <a href="#" id="perbulan" class="dropdown-item">Mounth</a>
                            <!-- item-->
                            <a href="#" id="pertahun" class="dropdown-item">Year</a>
                            <!-- item-->
                        </div>
                    </div>
                    <h4 class="header-title mb-0">Dashboard Info</h4>
                </div>
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-wallet text-muted" style="font-size: 24px;"></i>
                                    <h3 id="pendapatan"><span>29</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Pendapatan</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-cart text-muted" style="font-size: 24px;"></i>
                                    <h3 id="pengeluaran"><span>715</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Pengeluaran</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                    <h3 id="jenis_surat"><span>29</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Jenis Surat</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-meter text-muted" style="font-size: 24px;"></i>
                                    <h3 id="kendaran"><span>715</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Kendaraan</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                    <h3 id="user"><span>31</span></h3>
                                    <p class="text-muted font-15 mb-0">Jumlah User</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-tags text-muted" style="font-size: 24px;"></i>
                                    <h3 id="bermalam"><span>93%</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Pendapatan Bermalam</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-4">Tasks Overview</h4>

                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="task-area-chart" data-bgColor="#727cf5" data-borderColor="#727cf5"></canvas>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
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
