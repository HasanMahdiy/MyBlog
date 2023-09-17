<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Blog Sitesi Yönetim Paneli')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('back')}}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('back')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('back')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('back')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{asset('back')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('back')}}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('back')}}/images/favicon.png" />

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <h4>Admin Panel</h4>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{asset('back')}}/images/faces/face28.jpg" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="ti-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{route('admin.login.page')}}">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Kategoriler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.articles.index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Nesneler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.pages.index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Sayfalar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.iletisim.index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Iletişim</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('back')}}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('back')}}/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('back')}}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('back')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{asset('back')}}/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('back')}}/js/off-canvas.js"></script>
<script src="{{asset('back')}}/js/hoverable-collapse.js"></script>
<script src="{{asset('back')}}/js/template.js"></script>
<script src="{{asset('back')}}/js/settings.js"></script>
<script src="{{asset('back')}}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('back')}}/js/dashboard.js"></script>
<script src="{{asset('back')}}/js/Chart.roundedBarCharts.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!-- End custom js for this page-->
@yield('scripts')
</body>

</html>

