<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('backend.includes.head')
    @yield('styles')
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      @include('backend.includes.nav')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('backend.includes.sidebar')
      <!-- Content Wrapper. Contains page content -->
      @yield('content')
      <!-- /.content-wrapper -->
      <!-- Main Footer -->
      @include('backend.includes.footer')
    </div>
    <!-- ./wrapper -->
    @include('backend.includes.scripts')
  </body>
</html>
