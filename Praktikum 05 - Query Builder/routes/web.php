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

Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/userRegistration',[UserController::class, 'create'])->name('user.registerPengguna');
Route::post('/userStore',[UserController::class, 'store'])->name('user.daftarPengguna');
Route::get('/userView/{user}',[UserController::class, 'show'])->name('user.infoPengguna');
Route::get('koleksi',[CollectionController::class, 'index'])->name('koleksi');
Route::get('/koleksiTambah',[CollectionController::class, 'create'])->name('koleksi.registerKoleksi');
Route::post('/koleksiStore',[CollectionController::class, 'store'])->name('koleksi.daftarKoleksi');
Route::get('/koleksiView/{collection}',[CollectionController::class, 'show'])->name('koleksi.infoKoleksi');

//Route pengambilan data
Route::get('/getAllCollections', [CollectionController::class, 'getAllCollections'])->middleware(['auth', 'verified']);
Route::get('/getAllUsers', [UserController::class, 'getAllUsers'])->middleware(['auth', 'verified']);

// update data perubahan koleksi
Route::post('/koleksiUpdate', [CollectionController::class, 'update'])->name('koleksi.daftarKoleksi');
Route::post('/userUpdate', [CollectionController::class, 'update'])->name('user.daftarPengguna');