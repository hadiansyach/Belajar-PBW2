<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

Route::get('/user',[UserController::class,'index']);
Route::get('/userRegistration',[UserController::class, 'create']);
Route::post('/userStore',[UserController::class, 'store(Request $request)']);
Route::get('/userView/{user}',[UserController::class, 'show(User $user)']);
Route::get('koleksi',[CollectionController::class, 'index']);
Route::get('/koleksiTambah',[CollectionController::class, 'create']);
Route::post('/koleksiStore',[CollectionController::class, 'store(Request $request)']);
Route::get('/koleksiView/{collection}',[CollectionController::class, 'show(Collection $collection)']);