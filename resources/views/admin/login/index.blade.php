<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')-</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="panel login">
                <div class="panel-body pd30">
                    <form action="/loginHandler" method="post">
                        <h2 class="text-center mgb30">后台登录</h2>
                        <div class="input-group w100 mgb15">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="input-group w100 mgb15">
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="input-group w100 mgb15">
                            {!! csrf_field() !!}
                            {!! Geetest::render() !!}
                        </div>
                        <div class="input-group w100 mgb15 text-center">
                            <button class="btn btn-primary w100">登录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
