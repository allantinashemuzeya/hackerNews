<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can REGISTER web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs', [HomeController::class, 'jobs']);
Route::get('/ask', [HomeController::class, 'askStories']);
Route::get('/comments', [HomeController::class, 'comments']);
Route::get('/commentItem', [HomeController::class, 'comments']);

