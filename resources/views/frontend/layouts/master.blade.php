<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TVETA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('frontend.includes.head')
</head>

<body>

    {{-- @include('frontend.includes.preloader') --}}

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper">

        @include('frontend.includes.nav')

        @yield('content')

        @include('frontend.includes.footer')

        <button id="back-top-top"><i class="ion-arrow-up-c"></i></button>

    </div>
    @include('frontend.includes.scripts')
</body>

</html>