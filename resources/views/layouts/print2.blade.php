<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jbook @yield('title','')</title>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>

<body>
    <header>
        @yield('header')
    </header>
    <section>
        @yield('content')
    </section>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>