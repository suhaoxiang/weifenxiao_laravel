<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/menu.css">
    <script src="/js/require.js"></script>
    @yield('css')
</head>
<body>
    <div class="header">
        @include('vendor/menu/layout/menu')
    </div>
    <div class="container wrapper">
        <div class="inner clearfix">
            <div class="content-left fl">
                @include('vendor/menu/layout/siderbar')
            </div>
            <div class="content-right">
                @yield('main')
            </div>
        </div>
    </div>
    @yield('js')
</body>
</html>