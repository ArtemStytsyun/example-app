<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <title>Document</title>
    </head>
    <body>
        <header class='bg-dark'>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
                <div class="container-fluid p-0">
                  <a class="navbar-brand" href="#">Navbar</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Tags</a>
                      </li>
                      {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Post
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="{{route('post.create')}}">Create</a></li>
                        </ul>
                      </li> --}}
                    </ul>
                  </div>
                </div>
              </nav>

        </header>
        <main class="container py-2">

            @yield('content')

        </main>
        <footer>
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

        </footer>
    </body>
</html>