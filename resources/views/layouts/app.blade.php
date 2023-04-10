<!DOCTYPE html>
<html lang="en">

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

                        <div>
                            @auth
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

    @vite('resources/js/app.js')
</body>

</html>