<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kanye Quotes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen container">
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ml-2">
                <h1>Kanye Quotes using Kanye.rest API</h1>
                <button class="btn btn-primary" id="refresh" onclick="refreshDiv();" !important>Refresh</button>
                <div class="separator"></div>
                <div class="bg-quotes" id="quotesResult">
                    @foreach($quotes as $key => $quote)
                    <p>
                        <span class="text-bold">{{$loop->iteration}}.</span> 
                        <span class="quote">"{{$quote}}"</span>
                        <span class="text-bold"> - Kanye West</span>
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script type ="text/javascript">
            function refreshDiv()
            {
                $('#quotesResult').load(location.href + " #quotesResult")
            }
        </script>
    </body>
</html>