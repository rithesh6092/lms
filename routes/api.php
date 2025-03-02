<?php

use App\Http\Controllers\Admin\api\JobController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\api\CourseController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
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

Route::name('api.')->group(function () {

    //admin login
    Route::post('/admin-login',[AuthController::class, 'adminLogin']);
    Route::post('/admin', [AuthController::class, 'createAdmin']);
    // Admin Routes (Requires auth & role:admin)
    Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::resource('students', AdminStudentController::class);
        Route::resource('instructors', InstructorController::class);
        Route::resource('categories', CategoryController::class);
    });

    Route::resource('courses', CourseController::class);
    Route::apiResource('jobs', JobController::class);

    Route::middleware('auth:sanctum')->group(function () {
        // Route::prefix('admin')->group(function () { 
        //    Route::get('/students', [AdminStudentController::class, 'index']);
        // });
    });
    Route::post('/student', [StudentController::class, 'store']);
    Route::post('/login',[StudentController::class, 'login']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
