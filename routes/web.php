<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/',[\App\Http\Controllers\site\HomeController::class,'main'])->name('main');
Route::get('/about',[\App\Http\Controllers\site\HomeController::class,'about']);
Route::get('/contact',[\App\Http\Controllers\site\HomeController::class,'contact']);
Route::post('/contact/store',[\App\Http\Controllers\site\HomeController::class,'contact_store'])->name('contact_store');
Route::get('/article',[\App\Http\Controllers\site\newsController::class,'index']);
Route::get('/article/{article:url_seo}',[\App\Http\Controllers\site\newsController::class,'news_info'])->name('news_info');
Route::get('/product/{product_cat?}',[\App\Http\Controllers\site\productController::class,'index'])->name('product');
Route::get('/compare/{product_cat_id}',[\App\Http\Controllers\site\compareController::class,'index'])->name('compare');

Route::get('/faq',[\App\Http\Controllers\site\faqController::class,'index'])->name('faq');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



