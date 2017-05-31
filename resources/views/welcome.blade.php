<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a,
            a {
                color: #fff;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .header{
                min-height: 660px;
                background: url('/uploed/blog/header.jpg') no-repeat top center;
                position: relative;
                -webkit-background-size:cover;
                -moz-background-size:cover;
                -o-background-size:cover;
                background-size:cover;
            }
            .overlay {
                position: absolute;
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                color: #fff;
                background-color: rgba(0, 0, 0, 0.6);
            }
        </style>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
    <div class="header">
            <div class="overlay">
                <div class="flex-center position-ref full-height">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @if (Auth::check())
                                @section('content')
                                <a class="btn btn-primary" href="{{ url('/posts') }}"> ENTER</a>
                                @endsection

                            @else
                                <a href="{{ url('/login') }}">Login</a>
                                <a href="{{ url('/register') }}">Register</a>
                            @endif
                        </div>
                    @endif

                    <div class="content" >
                        <div class="title m-b-md">
                            WELCOME TO MY BLOG
                        </div>
                            @yield('content')

                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="/js/app.js"></script>
</html>