<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <script> window.Laravel = {csrfToken: '{{ csrf_token() }}'} </script>
    @yield('styles')

</head>

<body>

<div id="app">
    <div id="container">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
</div>


<script src="{{mix('js/app.js')}}"></script>
</body>
</html>