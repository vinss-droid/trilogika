<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;

use App\Http\Controllers\SchemaController;
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

Route::get('/', [PageController::class, 'home'])->name('page.home');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
Route::get('/show_portofolio', [PageController::class, 'show_portofolio'])->name('page.show_portofolio');
Route::get('/programs', [PageController::class, 'programs'])->name('page.programs');
Route::get('/articles', [PageController::class, 'articles'])->name('page.articles');
Route::get('/visi-misi',[PageController::class,'visiMisi'])->name('page.visi-misi');
Route::get('/history',[PageController::class,'history'])->name('page.history');

// Route::get('/mengapa-perlu-sertifikasi', function () {
//     return view('show_mengapa');
// })->name('page.why-certification');

// socialite auth
Route::get('auth/{provider}',[SocialiteController::class,'redirectToProvider']);
Route::get('auth/{provider}/callback',[SocialiteController::class,'handleProvideCallback']);

Route::get('/dashboard', function () {
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/from-app',[GuestController::class,'formApp'])->name('page.formApp');
    Route::post('/regence',[IndoRegionController::class,'getRegencies'])->name('get_regencies');
    Route::post('/district',[IndoRegionController::class,'getDistricts'])->name('get_districts');
    Route::post('/village',[IndoRegionController::class,'getVillages'])->name('get_villages');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin/card', CardController::class);
    Route::resource('/admin/program', ProgramController::class);
    Route::resource('/admin/article', ArticleController::class);
    Route::resource('/admin/course', CourseController::class);
    Route::patch('/admin/course-status/{course}',[CourseController::class,'status'])->name('course.status');
    Route::resource('/admin/portofolio', PortofolioController::class);
    Route::resource('/admin/schema', SchemaController::class);
});

Route::get('/program/{slug}', [PageController::class, 'programSlug'])->name('program.slug');
Route::get('/article/{slug}', [PageController::class, 'articleSlug'])->name('article.slug');
Route::get('/course/{slug}', [PageController::class, 'courseSlug'])->name('course.slug');

require __DIR__ . '/auth.php';
