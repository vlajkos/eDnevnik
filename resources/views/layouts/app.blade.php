<!DOCTYPE html>
<html lang="en">
<!-- @php
$queryString = http_build_query([
'access_key' => '1628244f978e5c35da7b1a70d3fa2a33',
'query' => "Mladenovac",

]);
$response = Http::get("http://api.weatherstack.com/current", $queryString);

$jsonData = $response->json();


@endphp -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eDnevnik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body>
    <header>
        <nav>
            <div class="border-bottom p-2">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <p class="m-0">eDnevnik</p>





                        <div class="weather-main">
                            @auth
                            <div class="weather-container">
                                <div>
                                    <h6>@php echo($jsonData["request"]["query"]) @endphp</h6>
                                    <h6>@php echo($jsonData["current"]["temperature"] . " " ."°C"); @endphp</h6>
                                </div>

                                <div><img src="@php echo($jsonData['current']['weather_icons'][0]) @endphp"></div>

                            </div>

                            <form method="POST" @auth('web') action="{{ route('ucenik.logout') }}" @endauth @auth('admin') action="{{ route('profesor.logout') }}" @endauth>
                                @csrf
                                <button type="submit" class="btn btn-light">Log out</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container px-2 py-5">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
    @vite('resources/js/app.js')
</body>



</html>