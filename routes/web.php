<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Models\Article;
use App\Models\Courses;
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
});

Route::get('/program/{slug}', [PageController::class, 'programSlug'])->name('program.slug');
Route::get('/article/{slug}', [PageController::class, 'articleSlug'])->name('article.slug');

require __DIR__ . '/auth.php';
