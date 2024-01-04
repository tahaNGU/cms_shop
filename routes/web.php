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
Route::get('/product_page/{product:url_seo}',[\App\Http\Controllers\site\productController::class,'product'])->name('product_page');
Route::get('/final_cart',[\App\Http\Controllers\site\cartController::class,'finishBasket'])->name('finishBasket');
Route::get('/faq',[\App\Http\Controllers\site\faqController::class,'index'])->name('faq');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/add_cart/{id}',[\App\Http\Controllers\site\cartController::class,'addProduct'])->name('add_cart');
    Route::get('/remove_cart/{id}',[\App\Http\Controllers\site\cartController::class,'remove_cart'])->name('remove_cart');
    Route::get('order',[\App\Http\Controllers\site\cartController::class,'index'])->name('order');
    Route::get('order2',[\App\Http\Controllers\site\cartController::class,'order2'])->name('order2');
    Route::post('user_info_update',[\App\Http\Controllers\site\cartController::class,'user_info_update'])->name('user_info_update');
    Route::get('/panel',[\App\Http\Controllers\panelController::class,'index'])->name('panel');
    Route::get('/complete_user_information',[\App\Http\Controllers\site\cartController::class,'complete_user_information'])->name('complete_user_information');
    Route::post('/user_complete_information',[\App\Http\Controllers\site\cartController::class,'user_complete_information'])->name('user_complete_information');
});

require __DIR__.'/auth.php';



