<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\Live_coin;

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

Route::get('/', [Index::class, 'home']);
Route::get('/currencies', [Index::class, 'currencies']);
Route::get('/currencies/page/{id}', [Index::class, 'currencies_page']);
Route::get('currencies/{id}', [Index::class, 'coin']);
Route::get('/livecoin/{id}', [Live_coin::class, 'index']);