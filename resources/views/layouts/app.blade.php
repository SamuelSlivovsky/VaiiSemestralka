<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css?v=') . time() }}" rel="stylesheet">


</head>

<body>

    @include('includes.menu')
    <main>
        @yield('content')
        @include('includes.footer')
    </main>

    <script src="{{ asset('js/app.js') }}">

    </script>




</body>


</html>
