<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{ asset('/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="{{ asset('/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/sweet-alerts/css/sweetalert.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{ asset('/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/header-colors.css') }}" rel="stylesheet" />

  <title>{{ $title }} - {{ config('app.name') }}</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">{{ config('app.name') }}</h4>
        </div>
        <div class="toggle-icon ms-auto">
          <ion-icon name="menu-sharp"></ion-icon>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a href="{{ route('dashboard') }}">
            <div class="parent-icon">
              <ion-icon name="home-sharp"></ion-icon>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="{{ route('users') }}">
            <div class="parent-icon">
              <ion-icon class="lni lni-users"></ion-icon>
            </div>
            <div class="menu-title">Users</div>
          </a>
        </li>
        <li>
          <a href="{{ route('timesheet',['id' => Auth::User()->id]) }}">
            <div class="parent-icon">
              <ion-icon class="bx bx-spreadsheet"></ion-icon>
            </div>
            <div class="menu-title">Time Sheet</div>
          </a>
        </li>
        <li>
          <a href="{{ route('admin_report') }}">
            <div class="parent-icon">
              <i class="fadeIn animated bx bx-history"></i>
            </div>
            <div class="menu-title">Report</div>
          </a>
        </li>
      </ul>
      <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
          <ion-icon name="menu-sharp"></ion-icon>
        </div>
        <div class="top-navbar-right ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item mobile-search-button">
              <a class="nav-link" href="javascript:;">
                <div class="">
                  <ion-icon name="search-sharp"></ion-icon>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link dark-mode-icon" href="javascript:;">
                <div class="mode-icon">
                  <ion-icon name="moon-sharp"></ion-icon>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="user-setting">
                  <img src="/images/avatars/06.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex flex-row align-items-center gap-2">
                      <img src="/images/avatars/06.png" alt="" class="rounded-circle" width="54" height="54">
                      <div class="">
                        <h6 class="mb-0 dropdown-user-name">{{ ucfirst(Auth::User()->name) }}</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">{{ ucfirst(Auth::User()->designation) }}</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('profile', ['id' => Auth::User()->id]) }}">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="person-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('change_password') }}">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="settings-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Change Password</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="log-out-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--end top header-->


    @yield('content')
    </div>
    <!--start footer-->
    <footer class="footer">
      <div class="footer-text">
        Copyright © {{ now()->year }}. All right reserved.
      </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->


  <!-- JS Files-->
  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->
  <!--Toastr js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{ asset('/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/js/table-datatable.js') }}"></script>
  <script src="{{ asset('/plugins/datetimepicker/js/picker.js') }}"></script>
  <script src="{{ asset('/plugins/datetimepicker/js/picker.time.js') }}"></script>
  <script src="{{ asset('/plugins/datetimepicker/js/picker.date.js') }}"></script>
  <script src="{{ asset('/js/form-date-time-pickes.js') }}"></script>
  <script src="{{ asset('/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('/js/form-select2.js') }}"></script>
  <script src="{{ asset('/plugins/sweet-alerts/js/sweetalert.min.js') }}"></script>
  <script src="{{ asset('/plugins/sweet-alerts/sweetalert.js') }}"></script>
  <script src="{{ asset('/js/index.js') }}"></script>
  @yield('page-script')
  <script>
    $(document).ready(function () {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('warning'))
            toastr.warning('{{ Session::get('warning') }}');
        @endif
    });
  </script>
  <!-- Main JS-->
  <script src="{{ asset('/js/main.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
</body>

</html>