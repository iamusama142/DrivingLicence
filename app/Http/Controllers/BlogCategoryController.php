<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategory = BlogCategory::all();
        return view('Backend.Blogs.category')->with(compact('blogCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories,name,except,id'
        ]);

        BlogCategory::create([
            'name' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        return redirect()->back()->with('success', 'Blog Category Listed');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories,name,except,id'
        ]);
        $blogCategory = BlogCategory::find($id);
        $blogCategory->name = $request->title;
        $blogCategory->slug = Str::slug($request->title);
        $blogCategory->save();
        return redirect()->back()->with('success', 'Blog Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->back()->with('success', 'Blog Category Deleted');
    }
}
