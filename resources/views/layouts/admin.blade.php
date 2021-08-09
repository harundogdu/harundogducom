<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href={{asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css')}}>
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/@fortawesome/fontawesome-free/css/all.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
@yield('css')
<!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{route('admin')}}"><img
                    src="{{asset('backend/assets/images/logo.svg')}}"
                    alt="logo"/></a>
            <a class="sidebar-brand brand-logo-mini" href="{{route('admin')}}"><img
                    src="{{asset('backend/assets/images/logo-mini.svg')}}" alt="logo"/></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle "
                                 src="{{asset('backend/assets/images/faces/face15.jpg')}}" alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{auth()->user()->name}}</h5>
                            <span>Süper Admin</span>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Menüler</span>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/education*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('education.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Eğitimler</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/experience*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('experience.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Deneyimler</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/personal-information') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('personal-information')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Kişisel Bilgiler</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/social-media*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('social-media.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Sosyal Medya</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/services*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('services.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Servisler</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/clients*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('clients.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Araçlar</span>
                </a>
            </li>

            <li class="nav-item menu-items {{\Illuminate\Support\Facades\Request::is('admin/portfolio*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('portfolio.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Portfolyo</span>
                </a>
            </li>


        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="{{route('admin')}}"><img
                        src="{{asset('backend/assets/images/logo-mini.svg')}}" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle"
                                     src="{{asset('backend/assets/images/faces/face15.jpg')}}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{auth()->user()->name}}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="profileDropdown">

                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Çıkış Yap</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span
                        class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Harun Doğdu {{date('Y')}}</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- jquery -->
<script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- plugins:js -->
<script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('backend/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('backend/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/assets/js/misc.js')}}"></script>
<script src="{{asset('backend/assets/js/settings.js')}}"></script>
<script src="{{asset('backend/assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
@include('sweetalert::alert')
@yield('js')
</body>
</html>
