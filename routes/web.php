<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/products/create', 'create')->name('product.create');

Route::controller(ProductController::class)->group(function (){

    Route::get('/products','index')->name('product.index');
    Route::get('/products/{id}','show');
    Route::delete('/products/{id}','destory')->name('product.destory');
    Route::get('/products/update/{id}','update')->name('product.update');
    Route::put('/products/edit/{id}','edit')->name('product.edit');
    Route::post('/products/store','store')->name('product.store');
});


