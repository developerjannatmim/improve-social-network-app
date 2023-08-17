<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="{{ URL::to('src/css/main.css') }}" rel="stylesheet" >
</head>
<body>
    @include('includes.header')
    <div class='container'>
    @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js" ></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('src/js/app.js') }}"></script>
</body>
</html>