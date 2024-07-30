<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="row mb-5">


    <nav class="navbar navbar-dark bg-dark fixed-top mb-5">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex ms-auto me-3" role="search" action="{{ route('files.index') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            
            {{-- <div class="btn-group dropstart">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                    @if(Auth::user()->is_admin)
                        <li><a class="dropdown-item" href="/admin">Control Panel</a></li>
                    @endif
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
            </div> --}}
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

</div>
<div class="row mt-5">

    <div class="col-4">

    </div>
    <div class="col-4">

        <div class="card mt-5">
            <div class="card-header">
                File Upload Form
            </div>
            <div class="card-body">
                <p class="card-text">

                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">File Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="subcategory_id" class="form-label">Subcategory:</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-select" required>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image:</label>
                        <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="file_path" class="form-label">File:</label>
                        <input type="file" name="file_path" id="file_path" class="form-control" accept=".exe,.pdf,.rar,.zip,.deb,.iso" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                </form>

                </p>
            </div>
        </div>




    </div><div class="col-4">

    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
