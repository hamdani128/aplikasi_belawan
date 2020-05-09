<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar"> 
                    <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->fullname }}</span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit mr-1"></i>
                    <span>Settings</span>
                </a>
                <!-- item-->
                <div class="col-md-12 mt-1 justyfy-content-center">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                        {{-- <a href="" type="submit"><i class="fa fa-power-off"></i> Logout</a> --}}
                    </form>
                    </div>

            </div>
        </li>

    </ul>
        
</div>