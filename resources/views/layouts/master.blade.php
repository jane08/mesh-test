<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>
    @yield('styles')

</head>

<body>
Master

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