<?php

use App\Http\Controllers\CreateTimeSheetController;
use App\Http\Controllers\TimeSheetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');

    Route::get('/checkCurrentPassword', 'checkCurrentPassword')->name('checkCurrentPassword');
    Route::get('/change_password', 'change_password')->name('change_password');
    Route::post('/store_new_password', 'store_new_password')->name('store_new_password');

    Route::get('dashboard', 'dashboard')->name('dashboard');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/profile/{id}', 'profile')->name('profile');

    Route::get('/users', 'users')->name('users');
    Route::get('/add_user', 'add_user')->name('add_user');
    Route::post('/store_user', 'store_user')->name('store_user');
    Route::get('/edit_user/{id}', 'edit_user')->name('edit_user');
    Route::post('/update_user/{id}', 'update_user')->name('update_user');
    Route::post('/delete_user', 'delete_user')->name('delete_user');
    Route::get('/user_status/{id}', 'user_status')->name('user_status');
});

Route::controller(CreateTimeSheetController::class)->group(function() {
    Route::get('/check_shift', 'createEntriesForCurrentShift')->name('check_shift');
});

Route::controller(TimeSheetController::class)->group(function() {
    Route::get('/timesheet/{id}', 'timesheet')->name('timesheet');
    Route::post('/addtimesheet/{id}', 'addtimesheet')->name('addtimesheet');
    Route::post('/edittimesheet/{id}', 'edittimesheet')->name('edittimesheet');
    Route::get('/report/', 'admin_report')->name('admin_report');
    Route::post('/user_search', 'user_search')->name('user_search');
});
 
