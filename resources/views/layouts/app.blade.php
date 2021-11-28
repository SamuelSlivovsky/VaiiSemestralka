<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="nadpis">
        <h1>@yield('heading')</h1>
    </div>

    @include('includes.menu')
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}">

    </script>
</body>

</html>
