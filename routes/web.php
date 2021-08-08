<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\PersonalInformationController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('front.data.share')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/resume', [FrontController::class, 'resume'])->name('resume');
    Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
    Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::resource('education', EducationController::class);
    Route::post('education/change-status', [EducationController::class, 'changeStatus'])->name('education.change-status');

    Route::resource('experience', ExperienceController::class);
    Route::post('experience/change-status', [ExperienceController::class, 'changeStatus'])->name('experience.change-status');

    Route::get('personal-information',[PersonalInformationController::class,'index'])->name('personal-information');
    Route::post('personal-information/post',[PersonalInformationController::class,'postData'])->name('personal-information-post');
});
