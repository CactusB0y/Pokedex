<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
use App\Models\Pokemon;
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
    $pokemon = Pokemon::all();
    return view('welcome',compact('pokemon'));
});
Route::resource('pokemon', PokemonController::class);
Route::resource('type', TypeController::class);
Route::resource('photo', PhotoController::class);
