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
    @include('layouts.alert')
    <div class="container mt-4">

        @yield('content')


    </div>
 

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ url ('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>