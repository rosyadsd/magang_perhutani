<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporansController;
use App\Http\Controllers\BkphController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardBkphController;
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

// Laporans Route
Route::get('/category', [LaporansController::class, 'index']);
Route::get('/dashboard/laporans/recycle', [DashboardLaporanController::class, 'recycle']);
Route::get('/dashboard/laporans/export', [DashboardLaporanController::class, 'export']);
Route::get('/dashboard/laporans/{laporan:category_id}/jumlahdata', [DashboardLaporanController::class, 'jumlahdata']);
Route::get('/dashboard/laporans/restore/{laporan}', [DashboardLaporanController::class, 'restore']);
Route::post('/dashboard/laporans/delete/{laporan}', [DashboardLaporanController::class, 'delete']);
Route::resource('/dashboard/laporans', DashboardLaporanController::class)->middleware('auth');

// Categories Route
Route::get('/category/{category:id}',[LaporansController::class, 'show']);
// Route::get('/category/{category:id}/bulan/{bulan:id}',[LaporansController::class, 'show']);
Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show')->middleware('auth');
// Route::get('/dashboard/categories/fillSlug', [DashboardCategoryController::class, 'fillSlug']);

// Bkph Route
Route::get('/dashboard/bkphs/recycle', [DashboardBkphController::class, 'recycle']);
Route::get('/dashboard/bkphs/restore/{bkph}', [DashboardBkphController::class, 'restore']);
Route::post('/dashboard/bkphs/delete/{bkph}', [DashboardBkphController::class, 'delete']);
Route::resource('/dashboard/bkphs', DashboardBkphController::class)->middleware('auth');

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

