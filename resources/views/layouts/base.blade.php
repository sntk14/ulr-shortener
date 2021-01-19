<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        *{
            box-sizing: border-box;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            position: absolute;
            min-width: 60%;
        }

        .title {
            font-size: 84px;
        }
        .sm {
            margin: -30px 0 0;
            font-size: 30px;
        }

        .inline {
            display: flex;
        }

        a {
            color: #5690ac;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }
        .links{
            margin: 10px;
        }

        .links > a {
            color: #636b6f;
            padding: 5px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border: 1px solid #636b6f;
            border-radius: 5px;
        }

        .black_btn{
            margin-left: 5px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }

        .logo {
            position: absolute;
            /*right: -45px;*/
            top: -25px;
            max-width: 125px;
        }
    </style>
</head>
<body>
@include('common.nav')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        @isset($type)
            <div class="alert
                      {{ $type == 'success' ?? 'alert-success' }}
                      {{ $type == 'error' ?? 'alert-danger' }}" role="alert">
                {{ $message ?? '' }}
            </div>
        @endisset
        @yield('content')
    </div>
</div>
</body>
</html>
