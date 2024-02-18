<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Mail\EmailVerification;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $currentMonth = Carbon::now()->format('m');
        $totalstudents = DB::table('users')->whereMonth('created_at', $currentMonth)->count();
        $countone = 1;
        $countstudents = date('ym') . $totalstudents + $countone;
        $user = User::create([
            'student_id' => $countstudents,
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'user',
            'password' => Hash::make($request->password),
        ]);


        $studentDetail = StudentDetail::create([
            'student_id' => $user->id,
        ]);

        $notification = new Notification();
        $notification->title = 'New User Register: ' . $request->name;
        $notification->description = 'New User Register From This Email: ' . $request->email;
        $notification->student_id = $user->id;
        $notification->type = 'user_register';
        $notification->url = '/registered/users';
        $notification->save();
        event(new Registered($user));
        Auth::login($user);
        // $verificationUrl = config('app.url'.'/'.'verify-email-student/'. $user->id);
        // dd($verificationUrl);
        // Mail::to($user->email)->send(new EmailVerification($verificationUrl));
        session()->put(['user_register','True']);
        return redirect(RouteServiceProvider::HOME);
    }
}
