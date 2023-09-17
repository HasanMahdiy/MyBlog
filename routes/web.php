<?php

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

Route::get('/', [App\Http\Controllers\Front\Homepage::class ,'index'])->name('homepage');
Route::get('iletisim', [App\Http\Controllers\Front\Homepage::class, 'contact'])->name('contact');
Route::post('/iletisim',[App\Http\Controllers\Front\Homepage::class, 'contactpost'])->name('contact.post');
Route::get('/blog/{content}',[App\Http\Controllers\Front\Homepage::class , 'single'])->name('single');
Route::get('/kategori/{category}', [App\Http\Controllers\Front\Homepage::class, 'category'])->name('category');
Route::get('/{content}', [App\Http\Controllers\Front\Homepage::class, 'page'])->name('page');



// routes/web.php

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['hasan'])->group(function () {
        Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('/articles', App\Http\Controllers\Admin\ArticlesController::class);
        Route::resource('/pages', App\Http\Controllers\Admin\PagesController::class);
        Route::resource('/iletisim', App\Http\Controllers\Admin\IletisimController::class);
    });

    Route::get('/giris', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.page');
    Route::post('/giris', [App\Http\Controllers\Admin\AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/registar', [App\Http\Controllers\Admin\AuthController::class, 'registar'])->name('registar');
    Route::post('/registar', [App\Http\Controllers\Admin\AuthController::class, 'registarPost'])->name('registar.post');
});



