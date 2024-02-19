<?php

use App\Http\Controllers;
use App\Livewire\BlogCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Backend.login');
});

Route::get('/register-account', function () {
    return view('register');
});
Route::post('/login/account', [UserController::class, 'login_account'])->name('login.account');


Route::get('/cache', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return redirect()->back();
});
Route::get('/dashboard', function () {
    return view('Backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/appointments-requests', [AppointmentController::class, 'index'])->name('appointments.request');
    Route::resource('blogs', 'App\Http\Controllers\BlogController');
    Route::resource('blog-categories', 'App\Http\Controllers\BlogCategoryController');
    Route::resource('courses', 'App\Http\Controllers\CourseController');
    Route::resource('quizzez', 'App\Http\Controllers\QuizController');
    Route::resource('exam', 'App\Http\Controllers\ExamController');
    Route::resource('result', 'App\Http\Controllers\ResultController');
    Route::resource('student-gallery', 'App\Http\Controllers\StudentGalleryController');

    Route::get('/student/courses/enrollments', [CourseController::class, 'enrollments'])->name('courses.enrollments.history');
    Route::resource('announcement', 'App\Http\Controllers\AnnouncementController');
    Route::get('/students', [UserController::class, 'all_students'])->name('student.list');
    Route::get('/students/search', [UserController::class, 'search_student'])->name('student.search');

    Route::get('/export-data/{provider}/{source}', [UserController::class, 'export_data'])->name('export-data');
    Route::get('/results/inquery/{id}', [ResultController::class, 'check_answers_admin'])->name('check.answers.admin');



});


// User Side
Route::middleware('auth', 'verified')->group(function () {

    Route::get('student/dashboard', [UserController::class, 'index'])->name('student.dashboard');
    Route::post('enroll/course', [EnrollmentController::class, 'enroll_now'])->name('student.enroll');
    Route::get('stripe/checkout/success', [EnrollmentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');
    Route::get('/exam/start/{course_id}', [QuizController::class, 'get_quizzez_student'])->name('students.quizzez');
    Route::get('/start/exam/{exam_id}', [QuizController::class, 'start_quiz'])->name('exam.start');
    Route::post('/save-answer', [QuestionAnswerController::class, 'save_answer']);
    Route::get('/result/exam/student', [QuestionAnswerController::class, 'exam_results'])->name('exam.result.student');
    Route::get('/exams/results', [ExamController::class, 'exam_results_reporting'])->name('student.result');
    Route::get('/exams/results/inquery', [ResultController::class, 'result_inquiry'])->name('student.result.inquiry');
    Route::get('/check/answers/{id}', [ResultController::class, 'check_answers'])->name('check.answers');

    Route::get('/check/certificate/{id}', [ResultController::class, 'check_certificate'])->name('check.certificate');
    Route::get('/course/enrollments', [EnrollmentController::class, 'history_student'])->name('student.enrollments.history');
    Route::get('/student/notifications', [NotificationController::class, 'user_notifications'])->name('user.notifications');
    Route::get('/student/profile', [UserController::class, 'profile'])->name('student.profile');
    Route::post('/student/profile/edit', [UserController::class, 'profile_edit'])->name('student.profile.edit');


});



require __DIR__ . '/auth.php';
