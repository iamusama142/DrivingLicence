<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Notification;
use App\Models\Quiz;
use App\Models\Result;

use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use Illuminate\Support\Carbon;
use App\Models\ParticapateQuiz;


class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function save_answer(Request $request)
    {

        $examId = session()->get('exam_id');
        $participateId = session()->get('participate_id');
        $response = new QuestionAnswer();
        $response->participate_id = $request->participate_id;
        $response->participate_id = $participateId;
        $response->exam_id = $examId;
        $response->student_id = auth()->user()->id;
        $response->question_id = $request->question_id;
        $response->answer = $request->answer;
        //Check correct Answer
        $quiz = Quiz::where('id', $request->question_id)->first();
        if ($quiz->correct_options == $request->answer) {
            $response->status = '1';
        } else {
            $response->status = '0';
        }
        $response->save();
        return response()->json([
            'message' => 'Answer Saved',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function exam_results()
    {
        $examId = session()->get('exam_id');
        $participateId = session()->get('participate_id');
        $allQuestions = Quiz::where('exam_id', $examId)->count();
        $parkPerQuestion = Exam::where('id', $examId)->first();
        $totalMarks = $parkPerQuestion->per_q_mark * $allQuestions;
        $resultCount = QuestionAnswer::where('exam_id', $examId)
            ->where('participate_id', $participateId)
            ->where('status', '1')
            ->count();
        $resultMarks = $parkPerQuestion->per_q_mark * $resultCount;

        if ($totalMarks > 0) {
            $percentage = ($resultMarks / $totalMarks) * 100;
            // Check if the student has passed (assuming passing threshold is greater than 70%)
            $passingThreshold = 70; // You can adjust this threshold as needed
            $passStatus = ($percentage > $passingThreshold) ? 'Pass' : 'Fail';
            $result = new Result();
            $result->student_id = auth()->user()->id;
            $result->exam_id = $examId;
            $result->participate_id = $participateId;
            $result->total_marks = $totalMarks;
            $result->get_marks = $resultMarks;
            $result->status = $passStatus;
            $result->save();
            ParticapateQuiz::where('participate_id', $participateId)->where('status', '1')->update(['end_time' => Carbon::now()->format('h:i A'), 'status' => '0']);
            $result = Result::where('participate_id', $participateId)->join('exams', 'exams.id', '=', 'results.exam_id')->select('exams.title', 'results.*')->first();

            $notification = new Notification();
            $notification->title = 'New Quiz Submitted from:' . ' ' . auth()->user()->name;
            $notification->description = 'New result saved for exam: ' . auth()->user()->name;
            $notification->student_id = auth()->user()->id;
            $notification->type = 'exam_attempt';
            $notification->url = '/result';
            $notification->save();

            return view('UserSide.partials.certificate')->with(compact('result'));
        } else {
            return redirect()->route('student.dashboard')->with('error', 'Soory, Try Again Later');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionAnswer $questionAnswer)
    {
        //
    }
}
