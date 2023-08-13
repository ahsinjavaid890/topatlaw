<!-- <div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-hourglass"></div>
        </div>
    </div>
</div> -->
<header class="header-area">
    <div class="navbar-area">
    
        <div class="atorn-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ url('') }}">
                       
                        <img src="{{ url('public/images') }}/TOP AT LAW LOGO-01.jpg" width="150" height="80" alt="logo">
                       
                        @if(DB::table('sitesettings')->where('id', 1)->first()->logoenable == 'tittle')
                        <!-- <h2><?php //echo DB::table('sitesettings')->where('id', 1)->first()->websitetittle; ?></h2> -->
                        @endif
                    </a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ url('') }}" class="nav-link">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/lawyers') }}" class="nav-link">
                                    Lawyers
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/aboutus') }}" class="nav-link">
                                    About Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/contactus') }}" class="nav-link">Contact</a>
                            </li>
                                
                                @if(!session()->has('user'))
                                <li class="nav-item">
                                    <a href="{{url('signin/lawyer')}}" class="nav-link  btn btn-danger text-white pl-3 pr-3 pt-2 pb-2 mt-2">
                                       <i class="las la-sign-in-alt"></i> Login
                                    </a>
                                </li>

                                <li class="nav-item ml-0">
                                    <a href="{{url('register/')}}" class="nav-link  btn btn-outline-danger pl-3 pr-3 pt-2 pb-2 mt-2">
                                       <i class="la la-SIGNIN"></i>Register
                                    </a>
                                </li>
                                
                                @else
                                

                                <li class="nav-item">
                                    <div class="dropdown">
                                      <button class="btn btn-danger dropdown-toggle btn-sm mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="las la-user"></i>Account
                                      </button>
                                      <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item p-1" href="{{url('profile/lawyer')}}">My Profile</a>
                                        <a class="dropdown-item p-1" href="{{url('logout/lawyer')}}">Logout</a>
                                        
                                      </div>
                                    </div>
                                </li>

                                @endif 
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>



<header class="header-area">
        
        <div class="navbar-area">
            <div class="atorn-responsive-nav">
                <div class="container">
                    <div class="atorn-responsive-menu">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{ url('public/images') }}/TOP AT LAW LOGO-01.jpg" width="150" height="80" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atorn-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{ url('public/images') }}/TOP AT LAW LOGO-01.jpg" width="150" height="80" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav ml-auto">
                                
                            <li class="nav-item">
                                <a href="{{ url('') }}" class="nav-link">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/lawyers') }}" class="nav-link">
                                    Lawyers
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/aboutus') }}" class="nav-link">
                                    About Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/contactus') }}" class="nav-link">Contact</a>
                            </li>
                                
                                @if(!session()->has('user'))
                                <li class="nav-item">
                                    <a href="{{url('signin/lawyer')}}" class="nav-link  btn btn-danger text-white pl-3 pr-3 pt-2 pb-2 mt-2">
                                       <i class="las la-sign-in-alt"></i> Login
                                    </a>
                                </li>

                                <li class="nav-item ml-0">
                                    <a href="{{url('register/')}}" class="nav-link  btn btn-outline-danger pl-3 pr-3 pt-2 pb-2 mt-2">
                                       <i class="la la-SIGNIN"></i>Register
                                    </a>
                                </li>
                                
                                @else
                                

                                <li class="nav-item">
                                    <div class="dropdown">
                                      <button class="btn btn-danger dropdown-toggle btn-sm mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="las la-user"></i>Account
                                      </button>
                                      <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item p-1" href="{{url('profile/lawyer')}}">My Profile</a>
                                        <a class="dropdown-item p-1" href="{{url('logout/lawyer')}}">Logout</a>
                                        
                                      </div>
                                    </div>
                                </li>

                                @endif 
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>