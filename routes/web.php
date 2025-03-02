<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\web\AuthController;
use App\Http\Controllers\Admin\web\CourseController;
use App\Http\Controllers\Admin\web\InfoController;
use App\Http\Controllers\Admin\web\JobController;
use App\Http\Controllers\Admin\web\StudentController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/login', function () {
    return view('admin-auth.login');
})->name('login');

// Route::group(function () {
//     Route::get('/', [DashboardController::class, 'dashboard']);
// Route::post('login', [LoginController::class, 'store'])->name('admin-login');

    // authentication
Route::get('/auth/login-basic', [AuthController::class, 'index'])->name('auth-login-basic');
Route::controller(StudentController::class)->group(function () {
    Route::get('/register', 'signup')->name('student.register');
    Route::get('/slogin', 'login')->name('student.login');
});

Route::get('/about-us', [InfoController::class, 'aboutUs'])->name('about-us');
Route::get('/testimonials', [InfoController::class, 'testimonials'])->name('testimonials');
Route::get('/careers', [InfoController::class, 'careers'])->name('careers');
Route::get('/contact-us', [InfoController::class, 'contactUs'])->name('contact-us');
Route::get('/enquire-us', [InfoController::class, 'enquireUs'])->name('enquire-us');
Route::get('/courses', [CourseController::class, 'coursesPage'])->name('courses');


    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });
    Route::prefix('admin')->controller(StudentController::class)->group(function () {
        Route::get('students', 'index')->name('admin.all-students');
    });
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/profile',[StudentController::class, 'profile'])->name('student.profile');
    Route::get('/job-info',[JobController::class, 'jobInfo'])->name('job.info');
    
