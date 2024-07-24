<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex ms-auto me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    @if(Auth::user()->isAdmin)
                        <li><a class="dropdown-item" href="/admin">Control Panel</a></li>
                    @endif
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Main and Sub Categories</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-between">
                        <li class="nav-item">
                            <div class="list-group">
                                @foreach($categories as $category)
                                    <ul class="list-group-item list-group-item-light active mt-2 mb-2">
                                        {{ $category->name }}
                                    </ul>
                                    <div id="collapse-{{ $category->id }}">
                                        @foreach($category->subcategories as $subcategory)
                                            <a href="{{ route('files.subcategory', ['subcategory' => $subcategory->id]) }}" class="list-group-item list-group-item-action ml-3">{{ $subcategory->name }}</a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-5 pt-5">
        <div class="row mt-4">
            @foreach($files as $file)
                <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $file->image_path) }}" class="card-img-top responsive-img" alt="{{ $file->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $file->name }}</h5>
                            <p class="card-text">Category: {{ $file->category->name }}</p>
                            <p class="card-text">Subcategory: {{ $file->subcategory->name }}</p>
                            <p class="card-text">Uploaded By: {{ $file->uploaded_by }}</p>
                            <p class="card-text">Upload Date: {{ $file->created_at->format('d-m-Y') }}</p>
                            <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
