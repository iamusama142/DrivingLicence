<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParticapateQuiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quiz = Quiz::join('exams', 'exams.id', '=', 'quizzes.exam_id')->select('quizzes.*', 'exams.title')->get();
        $exam = Exam::all();

        return view('Backend.Quiz.list')->with(compact('quiz', 'exam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $exam = Exam::all();

        return view('Backend.Quiz.add')->with(compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Insert quiz information
        $request->validate([
            'exam_id' => 'required',

            'questions' => 'required|array',
            'options_a' => 'required|array',
            'options_b' => 'required|array',
            'options_c' => 'required|array',
            'options_d' => 'required|array',
            'correct_options' => 'required|array',
        ]);
        $questions = $request->input('questions');
        $optionsA = $request->input('options_a');
        $optionsB = $request->input('options_b');
        $optionsC = $request->input('options_c');
        $optionsD = $request->input('options_d');
        $correctOptions = $request->input('correct_options');
        // Iterate through each question and save to the database
        foreach ($questions as $key => $question) {
            Quiz::create([
                'exam_id' => $request->exam_id,
                'questions' => $question,
                'options_a' => $optionsA[$key],
                'options_b' => $optionsB[$key],
                'options_c' => $optionsC[$key],
                'options_d' => $optionsD[$key],
                'correct_options' => $correctOptions[$key],
            ]);
        }
        return redirect()->back()->with('success', 'Quiz added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function get_quizzez_student($course_id)
    {
        $course_id = decrypt($course_id);
        $exam = Exam::where('course_id', $course_id)->get();
        return view('UserSide.Exams.list')->with(compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function start_quiz($exam_id)
    {
        $exam_id = decrypt($exam_id);
        $questions = Quiz::where('exam_id', $exam_id)->get();
        $exam = Exam::where('id', $exam_id)->first();
        $participant_id = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
        $participant = new ParticapateQuiz();
        $participant->exam_id = $exam_id;
        $participant->student_id = auth()->user()->id;
        $participant->participate_id = $participant_id;
        $participant->start_time = Carbon::now()->format('h:i A');
        $participant->save();
        session()->put('exam_id', $exam_id);
        session()->put('participate_id', $participant->participate_id);

        return view('UserSide.Exams.quiz')->with(compact('questions', 'exam'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'questions' => 'required',
            'options_a' => 'required',
            'options_b' => 'required',
            'options_c' => 'required',
            'options_d' => 'required',
            'correct_options' => 'required',
        ]);
        $quiz = Quiz::find($id);
        $quiz->exam_id = $request->exam_id;
        $quiz->questions = $request->questions;
        $quiz->options_a = $request->options_a;
        $quiz->options_b = $request->options_b;
        $quiz->options_c = $request->options_c;
        $quiz->options_d = $request->options_d;
        $quiz->correct_options = $request->correct_options;
        $quiz->save();
        return redirect()->back()->with('success', 'Quiz Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz, $id)
    {

        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->back()->with('success', 'Question Deleted Successfully');
    }
}
