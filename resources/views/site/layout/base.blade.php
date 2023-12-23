<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site/node_modules/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/build/style.css')}}">


    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('site/assets/fave/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('site/assets/fave/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('site/assets/fave/favicon-16x16.png')}}">
    <link rel="manifest"  href="{{asset('site/assets/fave/site.webmanifest')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


   @yield('head')
</head>
<body class="bg-slate-50 font-YekanBakh-Regular text-sm">
    @include('site.layout.header')
    @yield('content')

<script src="{{asset('site/node_modules/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('site/src/js/jquery.js')}}"></script>
<script src="{{asset('site/src/js/main.js')}}"></script>
@yield('scripts')

</body>
</html>
