<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboard;
use App\Http\Controllers\Admin\DaftarPerusahaanController as DaftarPerusahaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mentor\MentorDashboardController as MentorDashboard;
use App\Http\Controllers\Perusahaan\DashboardController as PerusahaanDashboard;
use App\Http\Controllers\UserDashboardController as UserDashboard;
use App\Http\Controllers\User\Checkout\CheckoutKelasController as Checkout;
use App\Http\Controllers\User\Dashboard\KelasUser\KelasUserController as KelasUser;
use App\Http\Controllers\User\Community\LowonganController as Lowongan;
use \App\Http\Controllers\Perusahaan\PelamarController as Pelamar;
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

// midtrans route
Route::get('payment/success' , [Checkout::class, 'midtransCallback']);
Route::post('payment/success' , [Checkout::class, 'midtransCallback']);

Route::middleware(['auth'])->group(function(){
    // ARAHAN DASHBOARD ADMIN DAN USER -----------------------------------------------------------------------------------------
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
    // PERUSAHAAN DASHBOARD
    Route::prefix('perusahaan/dashboard')
    ->namespace('Perusahaan')->name('perusahaan.')
    ->middleware(['Perusahaan_Role','verified'])
    ->group(function(){
        Route::get('/', [PerusahaanDashboard::class, 'index'])->name('dashboard');
    });

    // PERUSAHAAN ----------------------------------------------------------------------------------------------------------------------------
    // PENGUMUMAN RECRUIT
    Route::prefix('perusahaan')
    ->namespace('Perusahaan')
    ->middleware(['Perusahaan_Role','verified'])
        ->group(function(){
           Route::resource('pengumuman','\App\Http\Controllers\Perusahaan\PengumumanController');
    });

    // PROFILE PERUSAHAAN
    Route::prefix('perusahaan')
    ->namespace('Perusahaan')
    ->middleware(['Perusahaan_Role','verified'])
        ->group(function(){
           Route::resource('profile-perusahaan','\App\Http\Controllers\Perusahaan\ProfileController');
    });

    // PELAMAR PERUSAHAAN
    Route::prefix('perusahaan')
    ->namespace('Perusahaan')
    ->middleware(['Perusahaan_Role','verified'])
        ->group(function(){
            Route::get('/download_cv/{file_cv}', [Pelamar::class, 'getFile'])->name('pelamar-perusahaan-cv');
            Route::get('/download_pendukung/{file_dukungan}', [Pelamar::class, 'getFilePendukung'])->name('pelamar-perusahaan-pendukung');
           Route::resource('pelamar-perusahaan','\App\Http\Controllers\Perusahaan\PelamarController');
    });

    // USER -----------------------------------------------------------------------------------------------------------------------------------
    // USER CHECKOUT KELAS
    Route::prefix('user')
    ->namespace('User')
    ->middleware(['User_Role','verified'])
        ->group(function(){
            Route::get('checkout-success', [Checkout::class, 'success'])->name('checkout-success');
           Route::resource('checkout','\App\Http\Controllers\User\Checkout\CheckoutKelasController');
    });

    // USER PROGRAM KELAS
    Route::prefix('user')
        ->group(function(){
            Route::resource('program-kelas', '\App\Http\Controllers\User\ProgramKelasUserController');
    });

    // USER COMMUNITY
    Route::prefix('user')
        ->group(function(){
            Route::get('communityprofile/{id}/perusahaan', [Lowongan::class, 'profile'])->name('community-profile');
            Route::resource('community', '\App\Http\Controllers\User\Community\LowonganController');
    });

    // DASHBOARD
    // USER KELAS SAYA
    Route::prefix('user')
        ->namespace('User')
        ->middleware(['User_Role','verified'])
        ->group(function(){
            Route::resource('kelas-saya', '\App\Http\Controllers\User\Dashboard\KelasUser\KelasUserController');
            Route::get('kelas/{id_video_kelas}/video', [KelasUser::class, 'video'])->name('kelas-saya-video');
            Route::post('kelas/{id_kelas}/selesai', '\App\Http\Controllers\User\Dashboard\KelasUser\KelasUserController@selesaikelas')
            ->name('kelas-saya-selesai');
    });

    // TRANSACTION
    Route::prefix('user')
    ->namespace('User')
    ->middleware(['User_Role','verified'])
    ->group(function(){
        Route::resource('pembelian-saya', '\App\Http\Controllers\User\Dashboard\PembelianSaya\ListPembelianSayaController');
    });

    
    // MENTOR ---------------------------------------------------------------------------------------------------------------------------------
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


    // ADMIN -----------------------------------------------------------------------------------------------------------------------------------
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

    // ADMIN APPROVAL VIDEO
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('approval-video', '\App\Http\Controllers\Admin\ApprovalVideoController');
            Route::post('Video/{id_kelas}/set-status', '\App\Http\Controllers\Admin\ApprovalVideoController@setStatus')
                    ->name('video-status');
    });

    // ADMIN MENU DETAIL KELAS
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('list-user', '\App\Http\Controllers\Admin\ListUserController');
    });

    // LIST PEMBAYARAN MENU DETAIL KELAS
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
            Route::resource('list-checkout', '\App\Http\Controllers\Admin\ListCheckoutController');
    });

    // DAFTAR PERUSAHAAN DAN LOWONGAN
    Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['Admin_Role','verified'])
    ->group(function () {
        Route::get('daftar-perusahaan', [DaftarPerusahaan::class, 'getPerusahaan'])->name('daftar-perusahaan');
        Route::get('daftar-perusahaan/{id}', [DaftarPerusahaan::class, 'showPerusahaan'])->name('daftar-perusahaan-show');
        Route::get('daftar-lowongan', [DaftarPerusahaan::class, 'getLowongan'])->name('daftar-lowongan');
        Route::get('daftar-lowongan/{id}', [DaftarPerusahaan::class, 'showLowongan'])->name('daftar-lowongan-show');
    });


});


require __DIR__.'/auth.php';
