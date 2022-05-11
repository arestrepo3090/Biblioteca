<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.0.2
* @link https://coreui.io
* Copyright (c) 2021 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Dashboard | Biblioteca</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset ('assets/dashboard/assets/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset ('assets/dashboard/assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset ('assets/dashboard/assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset ('assets/dashboard/assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('assets/dashboard/assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset ('assets/dashboard/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset ('assets/dashboard/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset ('assets/dashboard/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/dashboard/css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{ asset('assets/dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/datatables.min.css') }}" rel="stylesheet">
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>

    @yield('style')

  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="{{ asset ('assets/dashboard/assets/brand/coreui.svg#full')}}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="{{ asset ('assets/dashboard/assets/brand/coreui.svg#signet')}}"></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
	  <li class="nav-title">Biblioteca</li>
        <li class="nav-item"><a class="nav-link" href="/home">
            <svg class="nav-icon">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
            </svg> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="/autor">
            <svg class="nav-icon">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-address-book')}}"></use>
            </svg> Autor</a></li>
        <li class="nav-item"><a class="nav-link" href="/libro">
            <svg class="nav-icon">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-book')}}"></use>
            </svg> Libro</a></li>
		<li class="nav-item"><a class="nav-link" href="/prestamo">
            <svg class="nav-icon">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar')}}"></use>
            </svg> Préstamo</a></li>
		<li class="nav-item"><a class="nav-link" href="/usuario">
            <svg class="nav-icon">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
            </svg> Usuario</a></li>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="{{ asset ('assets/dashboard/assets/brand/coreui.svg#full')}}"></use>
            </svg></a>
          <ul class="header-nav ms-3">
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse!') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Bienvenido: {{ Auth::user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                  <div class="dropdown-header bg-light py-2">
                    <div class="fw-semibold">Cuenta</div>
                  </div>
                    <a class="dropdown-item" href="#">
                    <svg class="icon me-2">
                      <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg> Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      <svg class="icon me-2">
                        <use xlink:href="{{ asset ('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                      </svg>  {{ __('Cerrar sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2021 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components</a></div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset ('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{ asset ('assets/dashboard/vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/dashboard/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables.min.js') }}   "></script>
    <script src="{{ asset('assets/dashboard/js/datatables.js') }}   "></script>
    <script>
    </script>

    @yield('scripts')

  </body>
</html>
