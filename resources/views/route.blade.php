<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref">
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
        <div class="title m-b-md">
            Список билетов
        </div>
        <div class="links" style="text-align: left">
            <h3>Список рейсов </h3>

                @if(isset($routs["error"]))
                    @if($routs["error"] == "route_no_activ")
                        <div style="border-bottom: 1px solid #000000;">
                            <div><span style="font-weight: 600;">Маршрут не найден</span></div>
                        </div>
                    @endif
                    @if($routs["error"] == "interval_no_found")
                        <div style="border-bottom: 1px solid #000000;">
                            <div><span style="font-weight: 600;">Маршрут не найден</span></div>
                        </div>
                    @endif
                    @if($routs["error"] == "from_to_id")
                        <div style="border-bottom: 1px solid #000000;">
                            <div><span style="font-weight: 600;">Города не выбраны</span></div>
                        </div>
                    @endif
                @else
                    @foreach ($routs as $row)
                        <div style="border-bottom: 1px solid #000000;">
                            <div><span style="font-weight: 600;">Маршрут -</span> {{ $row["route_name"] }}</div>
                        </div>
                    @endforeach
                    @foreach ($routs as $row)
                            <div style="border-bottom: 1px solid #000000;">
                                <div><span style="font-weight: 600;">Маршрут -</span> {{ $row["route_name"] }}</div>
                                <div><span style="font-weight: 600;">Дата отправления -</span> {{ $row["date_from"] }}</div>
                                <div><span style="font-weight: 600;">Время отправления -</span> {{ $row["time_from"] }}</div>
                                <div><span style="font-weight: 600;">Откуда -</span> {{ $row["point_from"] }}</div>
                                <div><span style="font-weight: 600;">Дата прибытия -</span> {{ $row["date_to"] }}</div>
                                <div><span style="font-weight: 600;">Время прибытия -</span> {{ $row["time_to"] }}</div>
                                <div><span style="font-weight: 600;">Куда -</span> {{ $row["point_to"] }}</div>
                            </div>
                    @endforeach
                @endif



        </div>

    </div>
</div>
</body>
</html>
