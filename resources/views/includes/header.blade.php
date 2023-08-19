<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('public') }}">Social Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('public') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('public') }}">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('blog') }}" tabindex="-1" aria-disabled="true">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('create') }}" tabindex="-1" aria-disabled="true">Create Blog</a>
            </li>
          </ul>
          <ul class="navbar-nav justify-content-end">
          @if( !Auth::check() )
          <li class="nav-item">
              <a class="nav-link active" href="{{ route('register') }}">Register</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="{{ route('login') }}">Login</a>
          </li>
            @else
            <li class="nav-item">
               <a class="nav-link active" href="{{ route('logout') }}">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('account') }}">Account</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>