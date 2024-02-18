<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exam = Exam::all();
        $course = Course::where('status', 1)->get();
        return view('Backend.Exam.index')->with(compact('exam', 'course'));
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
            'course_id' => 'required',
            'title' => 'required',
            'question_marks' => 'required',
            'time_duration' => 'required',
        ]);
        $exam = new Exam();
        $exam->course_id = $request->course_id;
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->per_q_mark = $request->question_marks;
        $exam->timer = $request->time_duration;
        $exam->save();
        return redirect()->back()->with('success', 'Exam Listed Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function exam_results_reporting()
    {
        $result=Result::join('exams','exams.id','=','results.exam_id')->where('results.student_id', auth()->user()->id)->select('exams.title','results.*')->get();
        return view('UserSide.Exams.result')->with(compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
