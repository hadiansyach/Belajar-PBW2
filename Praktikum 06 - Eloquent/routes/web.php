<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\TransactionController;
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

// user
Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/userRegistration',[UserController::class, 'create'])->name('user.registerPengguna');
Route::post('/userStore',[UserController::class, 'store'])->name('user.daftarPengguna');
Route::get('/userView/{user}',[UserController::class, 'show'])->name('user.infoPengguna');

// koleksi
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

// transaksi
Route::get('/transaksi', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');
Route::get('/transaksiTambah', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');
Route::post('/transaksiStore', [TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');
Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->name('transaksiView');

// detail transaksi
Route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'detailTransactionKembalikan'])->middleware(['auth', 'verified'])->name('detailTransactionKembalikan');
Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update'])->name('transaksiView');

Route::get('/getAllTransactions', [TransactionController::class, 'getAllTransactions'])->name('getAllTransactions');
Route::get('/getAllDetailTransactions/{transactionId}', [DetailTransactionController::class, 'getAllDetailTransactions'])->middleware(['auth', 'verified'])->name('getAllDetailTransactions');
