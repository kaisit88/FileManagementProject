{{--<!-- resources/views/files/index.blade.php -->--}}

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Files</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container mt-5">--}}
{{--    <div class="row">--}}
{{--        @foreach($files as $file)--}}
{{--        <div class="col-md-4 mb-4">--}}
{{--            <div class="card">--}}
{{--                <img src="{{ asset('storage/' . $file->image_path) }}" class="card-img-top" alt="{{ $file->name }}">--}}

{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{ $file->name }}</h5>--}}
{{--                    <p class="card-text">{{ $file->category->name }}</p>--}}
{{--                    <p class="card-text">{{ $file->subcategory->name }}</p>--}}
{{--                    <a href="{{ asset('storage/' . $file->file_path)}}" class="btn btn-primary">Download</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--</body>--}}
{{--</html>--}}




    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>


    <style>
        .responsive-img {
            width: 100%;
            height: auto;
        }

        @media (min-width: 576px) {
            .responsive-img {
                height: 150px; /* Adjust height for small screens */
            }
        }

        @media (min-width: 768px) {
            .responsive-img {
                height: 200px; /* Adjust height for medium screens */
            }
        }

        @media (min-width: 992px) {
            .responsive-img {
                height: 250px; /* Adjust height for large screens */
            }
        }

        @media (min-width: 1200px) {
            .responsive-img {
                height: 300px; /* Adjust height for extra large screens */
            }
        }
    </style>






</head>
<body>

<div class="container-fluid">


    <div class="row">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('logout')}}"> <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form></a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
{{--                    <form class="d-flex" role="search">--}}
{{--                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                        <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                    </form>--}}

                    <form class="d-flex" role="search" action="{{ route('files.index') }}" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </nav>

    </div>

    <div class="row">
        @foreach($files as $file)
            <div class="col-md-2 mb-2">
                <div class="card">
                    <img src="{{ asset('storage/' . $file->image_path) }}" class="img-thumbnail responsive-img" alt="{{ $file->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $file->name }}</h5>
                        <p class="card-text">{{ $file->category->name }}</p>
                        <p class="card-text">{{ $file->subcategory->name }}</p>
                        <a href="{{ asset('storage/' . $file->file_path)}}" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
