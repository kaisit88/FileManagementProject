<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Subcategory;


class FileModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::with('subcategories')->get();

        // Assuming you have a search functionality
        $search = $request->query('search');
        $filesQuery = File::query();

        if ($search) {
            $filesQuery->where('name', 'like', '%' . $search . '%');
        }

        $files = $filesQuery->get();

        return view('files.index', compact('categories', 'files'));

    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('files.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'image_path' => 'required|image|max:51200', // Allow only image files up to 5MB
            'file_path' => 'required|file|mimes:exe,pdf,rar,zip,deb,iso|max:5120000', // Allow specified file types up to 50MB
        ]);

        // Store the image file
        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images', 'public');
        }

        // Store the main file
        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('files', 'public');
        }

        // Create a new file record in the database
        File::create($validated);

        // Redirect or return a response
        return redirect()->route('files.index')->with('success', 'File uploaded successfully!');
    }

    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        // Validate and update file
    }

    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files.index');
    }



    public function download(File $file)
    {
        $filePath = storage_path('app/public/' . $file->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath);
    }
    public function showBySubcategory(Subcategory $subcategory)
    {
        // Fetch files associated with the selected subcategory
        $files = $subcategory->files()->get(); // Use get() to retrieve the collection

        // Fetch categories with their subcategories for the sidebar
        $categories = Category::with('subcategories')->get();

        return view('files.index', compact('files', 'categories'));
    }




}
