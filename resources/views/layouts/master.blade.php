<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
    @yield('styles')

</head>

<body>
Master

@include('includes.header')
<div class="main">
    @yield('content')
</div>
@include('includes.footer')

</body>
</html>