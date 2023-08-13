@extends('admin.layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Analytics</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil uil-users-alt float-right'></i>
                    <h6 class="text-uppercase mt-0">Active Users</h6>
                    <h2 class="my-2" id="active-users-count">121</h2>
                    <p class="mb-0 text-muted">
                        <span class="text-success mr-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                        <span class="text-nowrap">Since last month</span>  
                    </p>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->

            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil uil-window-restore float-right'></i>
                    <h6 class="text-uppercase mt-0">Users Active</h6>
                    <h2 class="my-2" id="active-views-count">560</h2>
                    <p class="mb-0 text-muted">
                        <span class="text-danger mr-2"><span class="mdi mdi-arrow-down-bold"></span> 1.08%</span>
                        <span class="text-nowrap">Since previous week</span>
                    </p>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav float-right d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">7d</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">15d</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">1m</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="#">1y</a>
                        </li>
                    </ul>
                    <h4 class="header-title mb-3">Business Growth</h4>

                    <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>



    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop p-0"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                    <h4 class="header-title">Views Per Month</h4>

                    <div id="views-min" class="apex-charts mt-2" data-colors="#0acf97"></div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</div>
<!-- container -->
@endsection