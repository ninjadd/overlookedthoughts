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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('forums', [App\Http\Controllers\ForumController::class, 'store'])->name('forms.store')->middleware('web');

Route::get('forums/{forum}/topics', [App\Http\Controllers\TopicController::class, 'index'])->name('topics.index');

Route::post('forums/{forum}/topics', [App\Http\Controllers\TopicController::class, 'store'])->name('topics.store')->middleware('web');

Route::get('forums/{forum}/topics/{topic}/threads', [App\Http\Controllers\ThreadController::class, 'index'])->name('threads.index');


