<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardFeedbackController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SuperAdminController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', function(){
    return view('home',[
        'title' => 'Homepage',
        'active' => 'homepage'
    ]);
});

// Dashboard Menu Route
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// Feedback Route
Route::get('/feedback',[FeedbackController::class,'index']);
Route::post('/feedback',[FeedbackController::class, 'store']);
Route::resource('/dashboard/feedbacks', DashboardFeedbackController::class)->except(['create', 'edit', 'update'])->middleware('auth');

// Login Route
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

// Courses Route
Route::get('/category', [CoursesController::class, 'index']);
Route::get("/course/{course}",[CoursesController::class, 'getCourse']);
Route::get('/dashboard/courses/recycle', [DashboardCourseController::class, 'recycle']);
Route::get('/dashboard/courses/restore/{course}', [DashboardCourseController::class, 'restore']);
Route::post('/dashboard/courses/delete/{course}', [DashboardCourseController::class, 'delete']);
Route::resource('/dashboard/courses', DashboardCourseController::class)->middleware('auth');

// Categories Route
Route::get('/category/{category:slug}',[CoursesController::class, 'show']);
Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show')->middleware('auth');
Route::get('/dashboard/categories/fillSlug', [DashboardCategoryController::class, 'fillSlug']);

// User Controller
Route::get('/dashboard/users/recycle', [SuperAdminController::class, 'recycle']);
Route::get('/dashboard/users/restore/{user}', [SuperAdminController::class, 'restore']);
Route::post('/dashboard/users/delete/{user}', [SuperAdminController::class, 'delete']);
Route::resource('/dashboard/users', SuperAdminController::class)->except(['show','edit','update'])->middleware('super_admin');

// Changepassword Controller
Route::get('/dashboard/changepassword',[ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('/dashboard/changepassword',[ChangePasswordController::class, 'changePassword'])->middleware('auth');

// Testing Page Route
Route::get('/test', function(){
    return view('test.index',[
        'title' => 'Test Page'
    ]);
});

