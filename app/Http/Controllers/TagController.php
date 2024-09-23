<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // List all tags
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    // Show form to create a new tag
    public function create()
    {
        return view('tags.create');
    }

    // Store a new tag
    public function store(Request $request)
    {
        Tag::create($request->all());
        return redirect()->route('tags.index');
    }

    // Show form to edit a tag
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    // Update a tag
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect()->route('tags.index');
    }

    // Delete a tag
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
