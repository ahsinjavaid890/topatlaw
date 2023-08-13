<div class="card lawyer-sidebar mb-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="rounded-picture-container">
                                                <img src="{{ url('public/images/') }}/{{$data->image}}" class="rounded-picture">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-md-12 text-center">
                                            <b>{{ $data->name }}</b>
                                            <p>{{ $data->emailaddress }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="sidebar-lawyer nav flex-row">
                              <li class="nav-item">
                                <a class="nav-link active-navbar" href="{{url('profile/dashboard')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="la la-home"></i>
                                        </div>
                                        <div>
                                            Dashboard
                                        </div>
                                    </div>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('profile/review')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="las la-star-half-alt"></i>
                                        </div>
                                        <div>
                                            Reviews
                                        </div>
                                    </div>
                                </a>
                              </li>

                              
                              @if($data->approve_profile == 1)
                              <li class="nav-item">
                                <a class="nav-link" href="{{url('profile/boost')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="las la-tachometer-alt"></i>
                                        </div>
                                        <div>
                                            Boost Profile
                                        </div>
                                    </div>
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="las la-tachometer-alt"></i>
                                        </div>
                                        <div>
                                            Boost Profile
                                        </div>
                                    </div>
                                </a>
                              </li>
                              @endif

                              <li class="nav-item">
                                <a class="nav-link" href="{{url('profile/lawyer')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="las la-id-badge"></i>
                                        </div>
                                        <div>
                                            My Lawyer Profile
                                        </div>
                                    </div>
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="{{url('profile/badge')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="las la-certificate"></i>
                                        </div>
                                        <div>
                                            Badges
                                        </div>
                                    </div>
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="{{url('profile/myprofile')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="la la-user"></i>
                                        </div>
                                        <div>
                                            My Profile
                                        </div>
                                    </div>
                                </a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="{{url('logout/lawyer')}}">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <i class="la la-sign-out"></i>
                                        </div>
                                        <div>
                                            Logout
                                        </div>
                                    </div>
                                </a>
                              </li>

                            </ul>
                        </div>
                    </div>