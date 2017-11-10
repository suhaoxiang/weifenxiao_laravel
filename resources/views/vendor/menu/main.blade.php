<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <script src="/public/js/require.js"></script>
    <script src="/public/js/main.js"></script>
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

    <div class="footer">© 2017. All rights reserved.</div>
    @include('vendor/menu/layout/message')
    @yield('js')
</body>
</html>