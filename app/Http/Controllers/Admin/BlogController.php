<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255|unique:blogs,title',
            'desc' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $path = $request->file('image')->store('deals/images', 'public');
        $validated['image'] = $path ;

        $blog = Blog::create($validated);

    

        return back()->with('success', 'Blog Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255|unique:blogs,title',
            'desc' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $path = $request->file('image')->store('deals/images', 'public');
        $validated['image'] = $path ;

        $blog->update($validated);

        return back()->with('success', 'Blog Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return back()->with('success', 'Blog deleted successfully.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting blog']);
        }
    }
}
