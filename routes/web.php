<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\SequenceController;
use App\Http\Controllers\ZombieController;
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

Route::get('/zombie', [ZombieController::class, 'index']);
Route::post('/zombie', [ZombieController::class, 'predict']);
Route::get('/sequence', [SequenceController::class, 'index']);
Route::post('/sequence', [SequenceController::class, 'generate']);
Route::get('/', function(){return view('welcome');});
