<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Course;
use App\Models\Result;
use App\Models\Enrollment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\ParticapateQuiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
   
       
        // Putting a value into session
session()->put('user_id', auth()->user()->id);

// Getting the value from session

        $course = Course::where('status', 1)->get();
        $enrollment = Enrollment::where('student_id', auth()->user()->id)->count();
        $exams_attempt = ParticapateQuiz::where('student_id', auth()->user()->id)->count();
        $pass_exams = Result::where('student_id', auth()->user()->id)->count();

        return view('UserSide.dashboard')->with(compact('course', 'enrollment', 'exams_attempt', 'pass_exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login_account(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // If user exists with provided email
            if (Hash::check($request->password, $user->password)) {
                if ($user->type == 'user') {
                    Auth::login($user);
                    return redirect()->route('student.dashboard');
                } else {
                    Auth::login($user);
                    return redirect('/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Credentials Wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Credentials Wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function all_students()
    {
        $students = User::where('type', 'user')->orderBy('created_at', 'DESC')->get();
        $query = NULL;
        return view('Backend.Students.list')->with(compact('students', 'query'));
    }

    /**
     * Display the specified resource.
     */
    public function search_student(Request $request)
    {
        $query = $request->get('student_name');

        $students = User::where('type', 'user')->where('name', 'like', '%' . $query . '%')->get();

        return view('Backend.Students.list', compact('students', 'query'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userDetail = StudentDetail::where('student_id', auth()->user()->id)->first();
        return view('UserSide.Profile.index')->with(compact('user', 'userDetail'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function profile_edit(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename_img = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/all'), $filename_img);
            $user->avatar = $filename_img;
        }
        $user->save();
        $userDetail = StudentDetail::where('student_id', auth()->user()->id)->first();
        $userDetail->address = $request->address;
        $userDetail->phone = $request->phone;
        $userDetail->city = $request->city;
        $userDetail->state = $request->state;
        $userDetail->country = $request->country;
        $userDetail->about = $request->about;
        $userDetail->save();
        return redirect()->back()->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function export_data($provider, $source)
    {
        if ($source == 'user') {
            if ($provider == 'pdf') {
                $data = User::where('type', 'user')->join('student_details', 'student_details.student_id', '=', 'users.id')->select('users.*', 'student_details.phone', 'student_details.address')->get();
                $html = view('Backend.Exports.students', compact('data'))->render();
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                return $dompdf->stream('students.pdf');
            } else {
            }
        } elseif ($source == 'appointment') {
            if($provider == 'pdf')
            {
                $data=Appointment::all();
                $html = view('Backend.Exports.appointment', compact('data'))->render();
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                return $dompdf->stream('appointment.pdf');

            }else{

            }
        } else {
            if ($provider == 'pdf') {
                $data = Result::join('exams', 'exams.id', '=', 'results.exam_id')->join('users', 'users.id', 'results.student_id')->select('exams.title', 'results.*', 'users.name')->get();
                $html = view('Backend.Exports.results', compact('data'))->render();
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                return $dompdf->stream('results.pdf');
            } else {
            }
        }
    }
}
