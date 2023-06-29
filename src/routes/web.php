<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\DataController;




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

// Artist routes

Route::get('/', [HomeController::class, 'index']);
Route::get('/artists', [ArtistController::class, 'list']);
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::post('/artists/put', [ArtistController::class, 'put']);
Route::get('/artists/update/{artist}', [ArtistController::class, 'update']);
Route::post('/artists/patch/{artist}', [ArtistController::class, 'patch']);
Route::post('/artists/delete/{artist}', [ArtistController::class, 'delete']);

//Painting routes

Route::get('/paintings', [PaintingController::class, 'list']);
Route::get('/paintings/create', [PaintingController::class, 'create']);
Route::post('/paintings/put', [PaintingController::class, 'put']);
Route::get('/paintings/update/{painting}', [PaintingController::class, 'update']);
Route::post('/paintings/patch/{painting}', [PaintingController::class, 'patch']);
Route::post('/paintings/delete/{painting}', [PaintingController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
Route::post('/auth', [AuthorizationController::class, 'authenticate']);
Route::get('/logout', [AuthorizationController::class, 'logout']);

// Style routes

Route::get('/styles', [StyleController::class, 'list']);
Route::get('/styles/create', [StyleController::class, 'create']);
Route::post('/styles/put', [StyleController::class, 'put']);
Route::get('/styles/update/{style}', [StyleController::class, 'update']);
Route::post('/styles/patch/{style}', [StyleController::class, 'patch']);
Route::post('/styles/delete/{style}', [StyleController::class, 'delete']);

// Data routes
Route::prefix('data')->group(function () {
 Route::get('/get-top-paintings', [DataController::class, 'getTopPaintings']);
 Route::get('/get-painting/{painting}', [DataController::class, 'getPainting']);
 Route::get('/get-related-paintings/{painting}', [DataController::class, 'getRelatedPaintings']);
});



?>