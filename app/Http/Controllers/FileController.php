<?php

namespace App\Http\Controllers;

use App\Models\File; 
use Illuminate\Http\Request;

class FileController extends Controller
{
    // List all files
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    // Show form to upload a new file
    public function create()
    {
        return view('files.create');
    }

    // Store a new file
    public function store(Request $request)
    {
        $path = $request->file('file')->store('uploads', 'public');

        File::create([
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $request->file('file')->getClientMimeType(),
        ]);

        return redirect()->route('files.index');
    }

    // Delete a file
    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files.index');
    }
}
