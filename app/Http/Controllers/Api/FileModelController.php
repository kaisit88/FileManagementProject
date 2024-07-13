<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $files = File::all();
        return response()->json(['data' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json(['message' => 'File stored successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $file = File::findOrFail($id);
        return response()->json(['data' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $file = File::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'image_path' => 'nullable|image|max:51200',
            'file_path' => 'nullable|file|mimes:exe,pdf,rar,zip,deb,iso|max:5120000',
        ]);

        // Update logic here, such as updating file details and saving to database

        return response()->json(['message' => 'File updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);

        // Delete logic here, such as deleting file from storage and database
        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }
}
