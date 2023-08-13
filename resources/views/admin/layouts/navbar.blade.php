<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                            <!-- <a href="javascript: void(0);" class="text-dark">
                                <small>Clear All</small>
                            </a> -->
                        </span>Notification
                    </h5>
                </div>

                <div style="max-height: 230px;" data-simplebar>

                    <?php foreach(DB::table('adminnotifications')->where('readstatus' , 0)->orderBy('created_at','desc')->get() as $r){ ?>

                    <!-- item-->
                    <a href="{{ url('') }}/{{ $r->url }}" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="{{ $r->type }}"></i>
                        </div>
                        <p class="notify-details">{{ $r->notification }}
                            <small class="text-muted"></small>
                        </p>
                    </a>
                    <?php }  ?>
                </div>



            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar"> 
                    <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{Auth::user()->name}}</span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ url('admin/profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="{{ url('admin/profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit mr-1"></i>
                    <span>Settings</span>
                </a>

                

                <!-- item-->
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout mr-1"></i>
                    <span>Logout</span>
                </a>


 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
</div>