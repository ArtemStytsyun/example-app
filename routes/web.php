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

Route::get('/', 'indexController@index')->name('index');


//Posts
Route::get('/posts', "PostsController@index")->name('post.index'); 

Route::get('/posts/create', "PostsController@create")->name('post.create');
Route::post('/posts', "PostsController@store")->name('post.store');

Route::get('/posts/{post}', "PostsController@show")->name('post.show');

Route::post('/posts/{post}/edit', "PostsController@edit")->name('post.edit');
Route::patch('/posts/{post}/update', "PostsController@update")->name('post.update');

Route::post('/posts/{post}/delete', "PostsController@delete")->name('post.delete');
Route::post('/posts/{post}/destroy', "PostsController@destroy")->name('post.destroy');



//Categories
Route::get('/сategories', "CategoriesController@index")->name('category.index'); 

Route::get('/сategories/create', "CategoriesController@create")->name('category.create');
Route::post('/сategories', "CategoriesController@store")->name('category.store');

Route::post('/сategories/{category}/edit', "CategoriesController@edit")->name('category.edit');
Route::patch('/categories/{category}/update', "CategoriesController@update")->name('category.update');

Route::post('/сategories/{category}/delete', "CategoriesController@delete")->name('category.delete');
Route::post('/сategories/{category}/destroy', "CategoriesController@destroy")->name('category.destroy');


