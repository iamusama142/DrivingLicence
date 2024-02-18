<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('Backend.Course.index')->with(compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function enrollments()
    {
        $enrollment = Enrollment::join('courses','courses.id','=','enrollments.course_id')->join('users','users.id','=','enrollments.student_id')->select('enrollments.*','courses.title','courses.price','users.name')->get();
        return view('Backend.Exam.enrollments')->with(compact('enrollment'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $course = new Course();
        $course->title = $request->title;
        $course->price = $request->price;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;
        $course->save();
        return redirect()->back()->with('success', 'Course Listed Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course=Course::find($course->id);
        $course->title = $request->title;
        $course->price = $request->price;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;
        $course->save();
        return redirect()->back()->with('success', 'Course Edited Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course=Course::find($course->id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Record Deleted Successfully');
    }
}
