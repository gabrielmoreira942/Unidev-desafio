<?php
use App\Http\Controllers\EstudoController;
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
    return redirect()->route('product.index');
});

        Route::get('/unidev', [EstudoController::class, 'index']);
        Route::get('/testes', [teste::class, 'teste']);
        Route::get('/mail', [MailController::class, 'mail']);
        Route::get('/user', [EstudoController::class, 'indUser']);


    //    Route::get('product/search', [ProductController::class, 'search'])->name('product.search'); NAO EXISTE MAIS

        Route::resource('product', ProductController::class);


       // Route::prefix('/product')->group(function(){

            // Route::get('/', [ProductController::class, 'index'])->name('product.index');
            // Route::get('/search', [ProductController::class, 'search'])->name('product.search');
            // Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            // Route::post('/store', [ProductController::class, 'store'])->name('product.store');

        // });



