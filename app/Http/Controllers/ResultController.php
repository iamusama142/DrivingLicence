<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\ParticapateQuiz;
use App\Models\QuestionAnswer;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Result::join('exams', 'exams.id', '=', 'results.exam_id')->join('users', 'users.id', 'results.student_id')->select('exams.title', 'results.*', 'users.name')->get();
        return view('Backend.Quiz.result')->with(compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function check_certificate($id)
    {
        $result = Result::where('participate_id', decrypt($id))->join('exams', 'exams.id', '=', 'results.exam_id')->select('exams.title', 'results.*')->first();
        return view('UserSide.partials.certificate')->with(compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function result_inquiry()
    {
        $results = Result::where('results.student_id', auth()->user()->id)->join('exams', 'exams.id', '=', 'results.exam_id')->select('exams.title', 'results.*')->get();
        return view('UserSide.Exams.inqury')->with(compact('results'));
    }

    /**
     * Display the specified resource.
     */
    public function check_answers($id)
    {
        $exam_id = decrypt($id);
        $questions = QuestionAnswer::where('participate_id', $exam_id)->where('student_id', auth()->user()->id)->get();
        return view('UserSide.Exams.results-check')->with(compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function check_answers_admin($id)
    {
        $exam_id = decrypt($id);
        $questions = QuestionAnswer::where('participate_id', $exam_id)->get();
        return view('Backend.Quiz.results-check')->with(compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
