<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url ('bootstrap/css/bootstrap.min.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-4">

        @yield('content')


    </div>
 


    <script src="{{ url ('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>