<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/home">
                    <b class="logo-abbr"><img src="../assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="..assets/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <p style="color: white; font-size:larger; font-weight:bold;">{{$title}}</p>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li><a href="{{route('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <!--**********************************
                    Admin Section Start
                    ***********************************-->
                    @php
                    if($role == 'admin'):
                    @endphp
                        <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Master Data</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">User</a></li>
                            <li><a href="#">Items</a></li>
                            <li><a href="#">Item Type</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Other</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="">%</i><span class="nav-text">Discount Setting</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="">$</i><span class="nav-text">Transaction</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="">!!</i><span class="nav-text">Report</span>
                        </a>
                    </li>
                    @php
                    endif;
                    @endphp
                    <!--**********************************
                    Admin Section end
                    ***********************************-->

                    <!--**********************************
                    Cashier Section Start
                    ***********************************-->
                    @php
                    if($role == 'cashier'):
                    @endphp
                        <li class="nav-label">Dashboard</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="">$</i><span class="nav-text">Transaction</span>
                        </a>
                    </li>
                    @php
                    endif;
                    @endphp
                    <!--**********************************
                    Cashier Section end
                    ***********************************-->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Undfnd</td>
                                                <td>Undfnd</td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-success">Edit <span class="btn-icon-right"><i class="fa fa-check"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger">Remove <span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../assets/plugins/common/common.min.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/gleek.js"></script>
    <script src="../assets/js/styleSwitcher.js"></script>

    <script src="../assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>