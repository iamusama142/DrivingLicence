<?php

namespace App\Http\Controllers;

use App\Models\StudentGallery;
use Illuminate\Http\Request;

class StudentGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = StudentGallery::all();
        return view('Backend.Gallery.index')->with(compact('gallery'));
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
            'title' => 'required',
            'image' => 'required',
        ]);
        $gallery = new StudentGallery();
        $gallery->name = $request->title;


        if ($request->file('image')) {
            $file = $request->file('image');
            $filename_img = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/all'), $filename_img);
            $gallery->image = $filename_img;
        }
        $gallery->save();
        return redirect()->back()->with('success', 'Student Gallery Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGallery $studentGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentGallery $studentGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGallery $studentGallery)
    {
        $request->validate([
            'title' => 'required',

        ]);
        $gallery = StudentGallery::find($studentGallery->id);

        $gallery->name = $request->title;
        if ($request->file('image')) {
            
            $imagePath = public_path('uploads/all/' . $gallery->image);

            // Check if the image exists before attempting to delete it
            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }
            // Delete the gallery entry

            $file = $request->file('image');
            $filename_img = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/all'), $filename_img);
            $gallery->image = $filename_img;
        }
        $gallery->save();
        return redirect()->back()->with('success', 'Student Gallery Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGallery $studentGallery)
    {
        $gallery = StudentGallery::find($studentGallery->id);
        if ($gallery) {
            // Get the image path
            $imagePath = public_path('uploads/all/' . $gallery->image);

            // Check if the image exists before attempting to delete it
            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }
            // Delete the gallery entry
            $gallery->delete();
            return redirect()->back()->with('success', 'Student Gallery Deleted');
        }
        return redirect()->back()->with('error', 'Try Again Later');
    }
}
