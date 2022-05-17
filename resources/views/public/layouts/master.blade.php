<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
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

<body class="layout-3">
  @include('public.components.header')

  <main class="main-wrapper container">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="main-footer bg-white text-center">
    Copyright &copy; 2022 DigiBook
  </footer>

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