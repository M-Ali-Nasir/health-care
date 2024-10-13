<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Epilepsy</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- jQuery and DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/remixicon/remixicon.css') }}" />

  <!-- Menu waves for no-customizer fix -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body style="background-color: #d884d4">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu " style="background-color: #f1ecf1">
        <div class="app-brand demo">
          <a href="{{ route('dashboard') }}" class="app-brand-link text-dark">

            <span class="app-brand-text demo menu-text fw-semibold ms-2">Epilepsy</span>
          </a>


        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item {{ Route::is('dashboard') ? 'active open': '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link {{ Route::is('dashboard') ? 'bg-white': '' }}">
              <i class="menu-icon tf-icons ri-home-smile-line"></i>
              <div data-i18n="Dashboards">Dashboards</div>
            </a>

          </li>


          <!-- Layouts -->


          <li class="menu-item {{ Route::is('all-users') ? 'active open': '' }}">
            <a href="{{ route('all-users') }}" class="menu-link {{ Route::is('all-users') ? 'bg-white': '' }}">
              <i class="menu-icon tf-icons ri-user-smile-line"></i>
              <div data-i18n="Blank">All Users</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('active-users') ? 'active open': '' }}">
            <a href="{{ route('active-users') }}" class="menu-link {{ Route::is('active-users') ? 'bg-white': '' }}">
              <i class="menu-icon tf-icons ri-user-smile-line"></i>
              <div data-i18n="Blank">Active Users</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('deactivated-users') ? 'active open': '' }}">
            <a href="{{ route('deactivated-users') }}"
              class="menu-link {{ Route::is('deactivated-users') ? 'bg-white': '' }}">
              <i class="menu-icon tf-icons ri-user-smile-line"></i>
              <div data-i18n="Blank">Deactivated Users</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('admin-appointments') ? 'active open': '' }}">
            <a href="{{ route('admin-appointments') }}"
              class="menu-link {{ Route::is('admin-appointments') ? 'bg-white': '' }}">
              <div data-i18n="Without menu">User Appointments</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('admin-medicines') ? 'active open': '' }}">
            <a href="{{ route('admin-medicines') }}"
              class="menu-link {{ Route::is('admin-medicines') ? 'bg-white': '' }}">
              <div data-i18n="Blank">User Medicine Alrams</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('admin-seizures') ? 'active open': '' }}">
            <a href="{{ route('admin-seizures') }}"
              class="menu-link {{ Route::is('admin-seizures') ? 'bg-white': '' }}">
              <div data-i18n="Without menu">User Seizure</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('admin-stories') ? 'active open': '' }}">
            <a href="{{ route('admin-stories') }}" class="menu-link {{ Route::is('admin-stories') ? 'bg-white': '' }}">
              <div data-i18n="Without menu">User Stories</div>
            </a>
          </li>


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="ri-menu-fill ri-24px"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">



            <ul class="navbar-nav flex-row align-items-center ms-auto">



              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <div class="d-grid px-4 pt-2 pb-1">

                  <a class="btn btn-danger d-flex" href="{{ route('logout') }}">
                    <small class="align-middle">Logout</small>
                  </a>

                </div>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">

          @yield('main')


        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->

  </div>

  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

  <!-- Place this tag before closing body tag for github widget button. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>