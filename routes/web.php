<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\teste;
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

Route::get('/', function () {

    return redirect()->route('user.index');
});

        Route::get('/unidev', [UserController::class, 'index']);
        Route::get('/mail', [MailController::class, 'mail']);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);           

    //    Route::get('product/search', [ProductController::class, 'search'])->name('product.search'); NAO EXISTE MAIS


    //    Route::get('product/{product}', [ProductController::class, 'destroy']);


       // Route::prefix('/product')->group(function(){

            // Route::get('/', [ProductController::class, 'index'])->name('product.index');
            // Route::get('/search', [ProductController::class, 'search'])->name('product.search');
            // Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            // Route::post('/store', [ProductController::class, 'store'])->name('product.store');

        // });



