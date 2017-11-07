<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')-</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('css')
</head>
<body>
    @include('admin.layout.header')
    <div class="wrapper clearfix">
        <div class="fl fl-box">
            @include('admin.layout.menu')
        </div>
        <div class="fr fr-box">
            @yield('main')
        </div>
    </div>

    @include('admin.layout.message')
    <script src="{{asset('js/main.js')}}"></script>
    @yield('js')

</body>
</html>