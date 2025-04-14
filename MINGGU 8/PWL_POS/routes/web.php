<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use Monolog\Level;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postregister']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [WelcomeController::class, 'index']);


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);       // menampilkan halaman awal user
        Route::post('/user/list', [UserController::class, 'list']);   // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);      // menyimpan data user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user
        Route::post('/ajax', [UserController::class, 'store_ajax']);  // menyimpan data user baru
        Route::get('/{id}', [UserController::class, 'show']);    // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);  // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // menampilkan halaman form edit user
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);  // menyimpan perubahan data user
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // menghapus data user
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus data user
        Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user

    });
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal Kategori
        Route::post('/list', [KategoriController::class, 'list']); // menampilkan data Kategori dalam bentuk json untuk datatables
        Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah Kategori
        Route::post('/', [KategoriController::class, 'store']);  // menyimpan data Kategori baru
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);  // menyimpan data kategori baru
        Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail Kategori
        Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit Kategori
        Route::put('/{id}', [KategoriController::class, 'update']);  // menyimpan perubahan data Kategori
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit user
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);  // menyimpan perubahan data user
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // menghapus data user
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data user
        Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data user
    });
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal Level
            Route::post('/list', [LevelController::class, 'list']); // menampilkan data Level dalam bentuk json untuk datatables
            Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah Level
            Route::post('/', [LevelController::class, 'store']);  // menyimpan data Level baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah kategori
            Route::post('/ajax', [LevelController::class, 'store_ajax']);  // menyimpan data kategori baru
            Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail Level
            Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit Level
            Route::put('/{id}', [LevelController::class, 'update']);  // menyimpan perubahan data Level
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit user
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);  // menyimpan perubahan data user
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // menghapus data user
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data user
            Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data user
        });
    });
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']); // menampilkan halaman awal Supplier
        Route::post('/list', [SupplierController::class, 'list']); // menampilkan data Supplier dalam bentuk json untuk datatables
        Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah Supplier
        Route::post('/', [SupplierController::class, 'store']);  // menyimpan data Supplier baru
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah kategori
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);  // menyimpan data kategori baru
        Route::get('/{id}', [SupplierController::class, 'show']); // menampilkan detail Supplier
        Route::get('/{id}/edit', [SupplierController::class, 'edit']); // menampilkan halaman form edit Supplier
        Route::put('/{id}', [SupplierController::class, 'update']);  // menyimpan perubahan data Supplier
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit user
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);  // menyimpan perubahan data user
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // menghapus data user
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // menghapus data user
        Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data user
    });
    // Staff hanya bisa melihat data barang
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal Barang
            Route::post('/list', [BarangController::class, 'list']); // menampilkan data Barang dalam bentuk json untuk datatables
            Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail Barang
        });
    });

    // ADM & MNG bisa menambah, mengedit, dan menghapus barang
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah Barang
            Route::post('/', [BarangController::class, 'store']);  // menyimpan data Barang baru

            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah barang dengan ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data barang baru ajax

            Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit Barang
            Route::put('/{id}', [BarangController::class, 'update']);  // menyimpan perubahan data Barang

            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // menampilkan halaman form edit barang dengan ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // menyimpan perubahan data barang dengan ajax

            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // menghapus data barang dengan ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // menghapus data barang dengan ajax
            Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang

            Route::get('/import', [BarangController::class, 'import']); // ajax form upload excel
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // AJAX import excel
            Route::get('/barang/export_excel', [BarangController::class, 'export_excel']); // ajax form export excel
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']); //export pdf
        });
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [WelcomeController::class, 'index']);
// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
