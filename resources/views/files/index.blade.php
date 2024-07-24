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

    <nav class="navbar navbar-dark bg-dark fixed-top" dir="ltr">
        <div class="container-fluid">
            {{-- <a class="navbar-brand m-1" href="#" dir="ltr">القائمة الجانبية المظلمة</a> --}}


            <div class="navbar">
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/admin">Control Panel</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul> 

                <form class="d-flex mt-2" role="search">
                    <button class="btn btn-success me-2" type="submit">بحث</button>

                    <input class="form-control me-1" type="search" placeholder="بحث" aria-label="بحث">
                </form>

            </div>


       

            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" dir="rtl">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <hr>
                        <li>
                            <h5 class="offcanvas-title" dir="rtl" id="offcanvasDarkNavbarLabel">  الاقسام الرئيسية و الفرعية</h5>

                        </li>

<hr>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="#">رابط</a>
                        </li>

                        <li>
                            <div class="col">
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
                            </div>

                        </li>
                        <li class="nav-item dropdown" dir="rtl">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                القائمة المنسدلة
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">عمل</a></li>
                                <li><a class="dropdown-item" href="#">عمل آخر</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">شيء آخر هنا</a></li>
                            </ul>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </nav>




{{-- <div class="container-fluid"> --}}

    
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary" dir="rtl">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" href="/files">نظام ادارة الملفات</a>
            <a href="/files/create" class="btn btn-primary nav-item" tabindex="-1" role="button" aria-disabled="true">Upload Files</a>

            <form class="d-flex mx-auto">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/admin">Control Panel</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav> --}}
    <!-- End Navbar -->

    <div class="row mt-3">
        <!-- Sidebar -->
        
        <!-- End Sidebar -->

        <div class="col-md-10">
            <!-- Main Content -->
            <div class="row">
                @foreach($files as $file)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $file->image_path) }}" class="card-img-top responsive-img" alt="{{ $file->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $file->name }}</h5>
                                <p class="card-text">{{ $file->category->name }}</p>
                                <p class="card-text">{{ $file->subcategory->name }}</p>
                                <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-primary">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Main Content -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
