<!-- resources/views/files/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        @foreach($files as $file)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $file->image_path) }}" class="card-img-top" alt="{{ $file->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $file->name }}</h5>
                    <p class="card-text">{{ $file->category->name }}</p>
                    <p class="card-text">{{ $file->subcategory->name }}</p>
                    <a href="{{ route('file.download', $file->id) }}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
