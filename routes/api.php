<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/send-appointment', [AppointmentController::class, 'store']);
Route::get('/blogs', [BlogController::class, 'blogs_all_api']);
Route::get('blog-detail/{slug}', [BlogController::class, 'blogs_detail_api']);

Route::get('/packages', [CourseController::class, 'api_packages']);
Route::post('/redirect-dashboard', [EnrollmentController::class, 'redirect_dashboard']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
