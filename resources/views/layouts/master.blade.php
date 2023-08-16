<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ URL::to('src/css/main.css') }}" rel="stylesheet" >
</head>
<body>
    @include('includes.header')
    <div class='container'>
    @yield('content')
    </div>
</body>
</html>