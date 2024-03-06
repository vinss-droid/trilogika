<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Models\Article;
use App\Models\Courses;
use App\Models\Portofolio;
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
Route::get('/show_galeri', [PageController::class, 'show_galeri'])->name('page.show_galeri');
Route::get('/programs', [PageController::class, 'programs'])->name('page.programs');
Route::get('/articles', [PageController::class, 'articles'])->name('page.articles');
Route::get('/visi-misi',[PageController::class,'visiMisi'])->name('page.visi-misi');

// Route::get('/mengapa-perlu-sertifikasi', function () {
//     return view('show_mengapa');
// })->name('page.why-certification');

Route::get('/dashboard', function () {
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/card', CardController::class);
    Route::resource('/admin/program', ProgramController::class);
    Route::resource('/admin/article', ArticleController::class);
    Route::resource('/admin/course', CourseController::class);
    Route::resource('/admin/portofolio', PortofolioController::class);
});

Route::get('/program/{slug}', [PageController::class, 'programSlug'])->name('program.slug');
Route::get('/article/{slug}', [PageController::class, 'articleSlug'])->name('article.slug');
Route::get('/course/{slug}', [PageController::class, 'courseSlug'])->name('course.slug');

require __DIR__ . '/auth.php';
