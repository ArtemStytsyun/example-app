<?php

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
Route::get('/', 'IndexController')->name('index');

Route::group(['namespace' => 'admin'], function(){
    Route::get('/admin', 'AdminController')->name('admin');

    Route::group(['namespace' => 'Post', 'prefix' => 'admin'], function(){
        //Список
        Route::get('/posts', "IndexController")->name('admin.post.index'); 
        //Просмотр
        Route::get('/posts/{post}', "ShowController")->name('admin.post.show');
        //Создание
        Route::get('/posts/create', "CreateController")->name('admin.post.create');
        Route::post('/posts/store', "StoreController")->name('admin.post.store');//!!!!!!!!!!!!!!!
        //Редактирование
        Route::post('/posts/{post}/edit', "EditController")->name('admin.post.edit');
        Route::patch('/posts/{post}/update', "UpdateController")->name('admin.post.update');
        //Удаление
        Route::post('/posts/{post}/delete', "DeleteController")->name('admin.post.delete');
        Route::delete('/posts/{post}/destroy', "DestroyController")->name('admin.post.destroy'); //!!!!!!!!!!!!!!!
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'admin'], function(){
        //Список
        Route::get('/сategories', "IndexController")->name('admin.category.index'); 
        //Создание
        Route::get('/сategories/create', "CreateController")->name('admin.category.create');
        Route::post('/сategories', "StoreController")->name('admin.category.store');
        //Редактирование
        Route::post('/сategories/{category}/edit', "EditController")->name('admin.category.edit');
        Route::patch('/categories/{category}/update', "UpdateController")->name('admin.category.update');
        //Удаление
        Route::post('/сategories/{category}/delete', "DeleteController")->name('admin.category.delete');
        Route::delete('/сategories/{category}/destroy', "DestroyController")->name('admin.category.destroy');
    });

});




    