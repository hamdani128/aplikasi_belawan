<div class="left-side-menu">

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!-- LOGO -->
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
            <img src="{{ asset('/assets/images/logo.png') }}" alt="" height="16" id="side-main-logo">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('/assets/images/logo_sm.png') }}" alt="" height="16" id="side-sm-main-logo">
            </span>
        </a>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href=" {{ url('/') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Klasifikasi Surat</li>

            <li class="side-nav-item">
                <a href="{{ route('TypeMail') }}" class="side-nav-link">
                    <i class="uil-file-info-alt"></i>
                    <span> Jenis Surat </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Kendaraan</li>
            <li class="side-nav-item">
                <a href="{{ route('Truck') }}" class="side-nav-link">
                    <i class="uil-truck"></i>
                    <span> Kendaraan </span>
                </a>
            </li>

                <li class="side-nav-title side-nav-item">Transaksi</li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-shopping-cart-alt"></i>
                        <span> Transaksi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('incoming_transaction') }}">Transaksi Masuk</a>
                        </li>
                        <li>
                            <a href="{{ route('outgoing_transaction') }}">Transaksi Keluar</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-title side-nav-item">Pembagian Pendapatan</li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-analytics"></i>
                        <span> Pembagian </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('forum_phg') }}">Forum </a>
                        </li>
                        <li>
                            <a href="{{ route('deposite_phg') }}">Setoran </a>
                        </li>
                    </ul>
                </li>

            @role('super admin')
                <li class="side-nav-title side-nav-item mt-1">Data Pendapatan Malam</li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-money-withdraw"></i>
                        <span> Pendapatan Malam </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('malam-smart') }}">PT. Smart Bulking</a>
                        </li>
                        <li>
                            <a href="{{ route('malam-phg') }}">PT. Phg CPO</a>
                        </li>
                    </ul>
                </li>
            @endrole
            @can('see report menu')                    
            <li class="side-nav-title side-nav-item mt-1">Laporan</li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class=" uil-chart"></i>
                    <span> Laporan</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('report-incoming') }}">Laporan Transaksi Masuk</a>
                    </li>
                    <li>
                        <a href="{{ route('report-outgoing') }}">Laporan Transaksi Keluar</a>
                    </li>
                    <li>
                        <a href="#">Laporan Line Total</a>
                    </li>
                </ul>
            </li>
            @endcan

            <li class="side-nav-title side-nav-item mt-1">Pengaturan</li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class=" uil-cog"></i>
                    <span> Pengaturan</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('activity') }}">History Activity</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Help Box -->
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>