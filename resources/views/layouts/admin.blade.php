<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8">
  <meta name="description" content="{{env('APP_NAME')}} Exchange Enugu Nigeria">
  <meta name="keywords" content="{{env('APP_NICK_NAME_1')}}, {{env('APP_NICK_NAME_2')}}, Crypto, Exchange, Escrow, Bitcoin, BTC, Buy Bitcoin, Sell Bitcoin, Ethereum, ETH, Buy Ethereum, Sell Ethereum, Enugu, Nigeria, bobbyaxe61">
  <meta name="author" content="{{env('APP_NAME')}}">
  <meta name="developer" content="bobbyaxe61">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Link -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icons/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/icons/favicon.png') }}" type="image/icon">
  <title>{{ env('APP_NAME') }}</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  {{-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> --}}

  <!-- Nucleo Icons -->
  <link href="{{url('css/nucleo-icons.css')}}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{url('css/black-dashboard.min.css')}}" rel="stylesheet" />

  <!-- CSS Files (Custom) -->
  <link href="{{url('css/ov.css')}}" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper">
 
    <!-- Start side panel -->
    <div class="sidebar">
      <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red" -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            {{substr(auth()->user()->name, 0, 2)}}
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            {{env('APP_NAME')}}
          </a>
        </div>
        <ul class="nav">
          <li class="" id="dashboard">
            <a href="{{url('admin/dashboard')}}">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="" id="product">
            <a href="{{url('admin/product/view')}}">
              <i class="tim-icons icon-bag-16"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="" id="team">
            <a href="{{url('admin/team/view')}}">
              <i class="tim-icons icon-badge"></i>
              <p>Team</p>
            </a>
          </li>
          <li class="" id="particular">
            <a href="{{url('admin/particular/view')}}">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>Particular</p>
            </a>
          </li>
          <li class="" id="notifications">
            <a href="{{url('admin/notifications')}}">
              <i class="tim-icons icon-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="" id="subscriptions">
            <a href="{{url('admin/subscriptions')}}">
              <i class="tim-icons icon-email-85"></i>
              <p>Subscriptions</p>
            </a>
          </li>
          <li class="" id="users">
            <a href="{{url('admin/users')}}">
              <i class="tim-icons icon-single-02"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- end side panel -->

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler" onclick="console.log('clicked')">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)" id="page-name">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="{{url('img/logos/jorax_2.png')}}" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    {{substr(auth()->user()->name, 0, 12)}}
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="/welcome" class="nav-item dropdown-item">Home</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a 
                      href="{{ route('logout') }}" 
                      class="nav-item dropdown-item" 
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Search Modal -->
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form class="modal-header" method="GET" action="/admin/users/search" id="search-users-form">
              @csrf
              <input type="text" name="name" class="form-control" id="search-users-form-input" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <!-- End Search Modal -->
      <!-- End Navbar -->

      <!-- Starts Yield Content -->
      @include('layouts.notification')
      @yield('content')
      <!-- End Yielded Content -->

      <!-- Start Footer -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
            © Copyright &nbsp;<span class="liqair-color font-size-2">{{env('APP_NAME')}}</span> <br> All Rights Reserved <span id="this-year"></span>
            <script>document.getElementById('this-year').appendChild(document.createTextNode(new Date().getFullYear()))</script>
          </div>
        </div>
      </footer>
      <!-- End Footer -->

    </div>
  </div>

  <!-- Start Plugin -->
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <h4 class="pt-2"><i class="tim-icons icon-atom"></i></h4>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
      </ul>
    </div>
  </div>
  <!-- End Plugin -->

  
  <!--   Core JS Files   -->
  <script src="{{url('js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{url('js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{url('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{url('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Chart JS -->
  <script src="{{url('js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{url('js/plugins/bootstrap-notify.js')}}"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{url('js/plugins/moment.min.js')}}"></script>
  <script src="{{url('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{url('js/black-dashboard.min.js')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');
        $full_page = $('.full-page');
        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;
        window_width = $(window).width();
        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        // Indicate active page
        let current_url = document.location.href;
        let paths = current_url.split("/");
        if (paths[3]=='admin') {
          $('#'+paths[4]).addClass('active');
          $('#page-name').html(paths[4]);
        }

        // Search users
        $("search-users-form-input").keypress(function(event) {
          if (event.which == 13) {
            event.preventDefault();
            $("search-users-form").submit();
          }
        });

        // Plugin events
        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }
        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <!-- Custom JS -->
  <script src="{{url('js/ov.js')}}"></script>

</body>

</html>