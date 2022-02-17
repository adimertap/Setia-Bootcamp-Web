<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UserDashboardController as UserDashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mentor\MentorDashboardController as MentorDashboard;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Sociallite Routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout', function () {
        return view('checkout');
    })->name('checkout');
    
    Route::get('success-checkout', function () {
        return view('success_checkout');
    })->name('success-checkout');
    
    Route::get('class', function () {
        return view('user.kelas.list_class');
    })->name('class');

    // USER
    // USER PROGRAM KELAS
    Route::prefix('user')
        ->namespace('User')
        ->middleware(['User_Role','verified'])
        ->group(function(){
            Route::resource('program-kelas', '\App\Http\Controllers\User\ProgramKelasUserController');
    });

    // ARAHAN DASHBOARD ADMIN DAN USER
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // USER DASHBOARD
    Route::prefix('user/dashboard')
        ->namespace('User')->name('user.')
        ->middleware(['User_Role','verified'])
        ->group(function(){
            Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });
    // ADMIN DASHBOARD
    Route::prefix('admin/dashboard')
        ->namespace('Admin')->name('admin.')
        ->middleware(['Admin_Role','verified'])
        ->group(function(){
            Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    });

    // MENTOR DASHBOARD
    Route::prefix('mentor/dashboard')
        ->namespace('Mentor')->name('mentor.')
        ->middleware(['Mentor_Role','verified'])
        ->group(function(){
            Route::get('/', [MentorDashboard::class, 'index'])->name('dashboard');
    });

    // MENTOR LIST KELAS
    Route::prefix('mentor/kelas')
        ->namespace('Mentor')
        ->middleware(['Mentor_Role','verified'])
        ->group(function () {
            Route::resource('mentor-kelas', '\App\Http\Controllers\Mentor\MentorKelasController');
    });

    // MENTOR LIST VIDEO
    Route::prefix('mentor/video')
        ->namespace('Mentor')
        ->middleware(['Mentor_Role','verified'])
        ->group(function () {
            Route::resource('mentor-video', '\App\Http\Controllers\Mentor\MentorVideoController');
    });


    // ADMIN MASTERDATA
    Route::prefix('admin/masterdata')
        ->namespace('Admin')
        ->middleware(['Admin_Role','verified'])
        ->group(function () {
            Route::resource('jenis-kelas', '\App\Http\Controllers\Admin\MasterJenisKelasController');
    });

    Route::prefix('admin/masterdata')
        ->namespace('Admin')
        ->middleware(['Admin_Role','verified'])
        ->group(function () {
            Route::resource('level', '\App\Http\Controllers\Admin\MasterLevelController');
    });

    Route::prefix('admin/masterdata')
        ->namespace('Admin')
        ->middleware(['Admin_Role','verified'])
        ->group(function () {
                Route::resource('diskon', '\App\Http\Controllers\Admin\MasterDiskonController');
        });

    Route::prefix('admin/masterdata')
        ->namespace('Admin')
        ->middleware(['Admin_Role','verified'])
        ->group(function () {
                Route::resource('kelas', '\App\Http\Controllers\Admin\MasterKelasController');
                Route::post('kelas/{id_kelas}/set-status', '\App\Http\Controllers\Admin\MasterKelasController@launch')
                    ->name('launch-kelas');
    });
    
    // ADMIN MENU MENTOR
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('list-mentor', '\App\Http\Controllers\Admin\ListMentorController');
            Route::delete('list/{id_kelas}', '\App\Http\Controllers\Admin\ListMentorController@kelasdestroy')
                ->name('list-mentor-destroy-kelas');
    });

    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('approval-video', '\App\Http\Controllers\Admin\ApprovalVideoController');
            Route::post('Video/{id_kelas}/set-status', '\App\Http\Controllers\Admin\ApprovalVideoController@setStatus')
                    ->name('video-status');
    });

    // MENU DETAIL KELAS
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('list-user', '\App\Http\Controllers\Admin\ListUserController');
    });

    

});


require __DIR__.'/auth.php';
