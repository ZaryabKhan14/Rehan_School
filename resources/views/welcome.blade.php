<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap CSS -->
        <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="text-center">
                @if (Route::has('login'))
                    <div class="mb-3">
                        <H1 class="mb-3">WELCOME TO REHAN SCHOOL</H1>
                        @auth
                            <a href="{{ url('/redirect') }}" class="btn btn-primary btn-lg">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">S I G N I N</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg ml-2 ">S I G N U P</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJTY5KVphtPhzWj9WO1clHTMGa0jPjyTktKTX4xG6IzLMQABc" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIyM2g3hiQQaIp6lgjLowxT20F44kP4Xw4tZTjr2" crossorigin="anonymous"></script>
    </body>
</html>
