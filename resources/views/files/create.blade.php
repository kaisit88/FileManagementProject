<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="row">



</div>
<div class="row mt-5">

    <div class="col-4">

    </div>
    <div class="col-4">

        <div class="card">
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
