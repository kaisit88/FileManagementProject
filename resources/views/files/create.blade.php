<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">File Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="subcategory_id">Subcategory:</label>
        <select name="subcategory_id" id="subcategory_id" required>
            @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="image_path">Image:</label>
        <input type="file" name="image_path" id="image_path" accept="image/*" required>
    </div>

    <div>
        <label for="file_path">File:</label>
        <input type="file" name="file_path" id="file_path" accept=".exe,.pdf,.rar,.zip,.deb,.iso" required>
    </div>

    <div>
        <button type="submit">Upload File</button>
    </div>
</form>
