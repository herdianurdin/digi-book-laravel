<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $app_title }}</title>

  <!-- Favicon -->
  <link href="{{ asset('favicon.png')}}" rel='icon' type='image/png' />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstarp/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}" />
</head>

<body class="sidebar-mini">
  <!-- Header Content -->
  @include('admin.components.header')

  <!-- Main Content -->
  <main class="main-content">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('admin.components.footer')

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/popper.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstarp/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>