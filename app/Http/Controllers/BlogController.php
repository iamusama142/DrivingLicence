<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::join('blog_categories','blog_categories.id','blogs.category_id')->select('blog_categories.name','blogs.*')->get();
        $categories = BlogCategory::all();
        return view('Backend.Blogs.list')->with(compact('blog','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('Backend.Blogs.add-blog')->with(compact('categories'));
    }

    public function blogs_all_api()
    {
        $blogs = Blog::join('blog_categories','blog_categories.id','blogs.category_id')
                    ->select('blog_categories.name','blogs.*')
                    ->get();
    
        foreach($blogs as $blog) {
            $blog->banner = config('app.url').'/public'.$blog->banner;
        }
    
        return response()->json([
            'code'=>'success',
            'blogs'=>$blogs
        ]);
    }
    
    
    public function blogs_detail_api($slug)
    {
        $blogs = Blog::where('blogs.slug',$slug)->join('blog_categories','blog_categories.id','blogs.category_id')
                    ->select('blog_categories.name','blogs.*')
                    ->first();
    
       
            $blogs->banner = config('app.url').'/public'.$blogs->banner;
        
    
        return response()->json([
            'code'=>'success',
            'blog_detail'=>$blogs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->title = $request->title;
        if ($request->file('banner')) {
            $bannerPath = $request->file('banner')->store('public/banners');
            $blog['banner'] = Storage::url($bannerPath);
        }
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        if ($request->file('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('public/meta_images');
            $blog['meta_image'] = Storage::url($metaImagePath);
        }
        $blog->save();
        return redirect()->back()->with('success', 'Blog Post Listed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('Backend.Blogs.edit-blog')->with(compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);
        $blog=Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->title = $request->title;
        if ($request->file('banner')) {
            $bannerPath = $request->file('banner')->store('public/banners');
            $blog['banner'] = Storage::url($bannerPath);
        }
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        if ($request->file('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('public/meta_images');
            $blog['meta_image'] = Storage::url($metaImagePath);
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Post Deleted');

    }
}
