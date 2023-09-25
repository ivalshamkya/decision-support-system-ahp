<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SuperadminController;
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
    return view('signin');
})->name('/');

//Auth
Route::post('/auth/sign-in', [AuthController::class, 'signin'])->name('/auth/sign-in');
Route::get('/auth/sign-out', [AuthController::class, 'logout'])->name('/auth/sign-out');

//Superadmin
Route::get('/dashboard', [SuperadminController::class, 'index'])->name('/dashboard/dashboard');
Route::get('/dashboard/users', [SuperadminController::class, 'users'])->name('/dashboard/users');
Route::get('/dashboard/users/add', [SuperadminController::class, 'add_users'])->name('/dashboard/users/add');
Route::post('/dashboard/users/insert', [SuperadminController::class, 'insert_users'])->name('/dashboard/users/insert');
Route::post('/dashboard/users/delete', [SuperadminController::class, 'delete_users'])->name('/dashboard/users/delete');
Route::get('/dashboard/users/edit/{id}', [SuperadminController::class, 'edit_users'])->name('/dashboard/users/edit');
Route::post('/dashboard/users/update', [SuperadminController::class, 'update_users'])->name('/dashboard/users/update');

Route::get('/dashboard/siswa', [AdminController::class, 'siswa'])->name('/dashboard/siswa');
Route::post('/dashboard/siswa/import', [AdminController::class, 'importSiswa'])->name('/dashboard/siswa/import');
Route::get('/dashboard/siswa/add', [AdminController::class, 'add_siswa'])->name('/dashboard/siswa/add');
Route::post('/dashboard/siswa/insert', [AdminController::class, 'insert_siswa'])->name('/dashboard/siswa/insert');
Route::post('/dashboard/siswa/delete', [AdminController::class, 'delete_siswa'])->name('/dashboard/siswa/delete');
Route::get('/dashboard/siswa/edit/{id}', [AdminController::class, 'edit_siswa'])->name('/dashboard/siswa/edit');
Route::post('/dashboard/siswa/update', [AdminController::class, 'update_siswa'])->name('/dashboard/siswa/update');

Route::get('/dashboard/kelas', [AdminController::class, 'kelas'])->name('/dashboard/kelas');
Route::get('/dashboard/kelas/add', [AdminController::class, 'add_kelas'])->name('/dashboard/kelas/add');
Route::post('/dashboard/kelas/insert', [AdminController::class, 'insert_kelas'])->name('/dashboard/kelas/insert');
Route::post('/dashboard/kelas/delete', [AdminController::class, 'delete_kelas'])->name('/dashboard/kelas/delete');
Route::get('/dashboard/kelas/edit/{id}', [AdminController::class, 'edit_kelas'])->name('/dashboard/kelas/edit');
Route::post('/dashboard/kelas/update', [AdminController::class, 'update_kelas'])->name('/dashboard/kelas/update');

Route::get('/dashboard/jurusan', [AdminController::class, 'jurusan'])->name('/dashboard/jurusan');
Route::get('/dashboard/jurusan/add', [AdminController::class, 'add_jurusan'])->name('/dashboard/jurusan/add');
Route::post('/dashboard/jurusan/insert', [AdminController::class, 'insert_jurusan'])->name('/dashboard/jurusan/insert');
Route::post('/dashboard/jurusan/delete', [AdminController::class, 'delete_jurusan'])->name('/dashboard/jurusan/delete');
Route::get('/dashboard/jurusan/edit/{id}', [AdminController::class, 'edit_jurusan'])->name('/dashboard/jurusan/edit');
Route::post('/dashboard/jurusan/update', [AdminController::class, 'update_jurusan'])->name('/dashboard/jurusan/update');

Route::get('/dashboard/kriteria', [AdminController::class, 'kriteria'])->name('/dashboard/kriteria');
Route::get('/dashboard/kriteria/add', [AdminController::class, 'add_kriteria'])->name('/dashboard/kriteria/add');
Route::post('/dashboard/kriteria/insert', [AdminController::class, 'insert_kriteria'])->name('/dashboard/kriteria/insert');
Route::post('/dashboard/kriteria/delete', [AdminController::class, 'delete_kriteria'])->name('/dashboard/kriteria/delete');
Route::get('/dashboard/kriteria/edit/{id}', [AdminController::class, 'edit_kriteria'])->name('/dashboard/kriteria/edit');
Route::post('/dashboard/kriteria/update', [AdminController::class, 'update_kriteria'])->name('/dashboard/kriteria/update');

Route::get('/dashboard/subkriteria', [AdminController::class, 'subkriteria'])->name('/dashboard/subkriteria');
Route::get('/dashboard/subkriteria/add', [AdminController::class, 'add_subkriteria'])->name('/dashboard/subkriteria/add');
Route::post('/dashboard/subkriteria/insert', [AdminController::class, 'insert_subkriteria'])->name('/dashboard/subkriteria/insert');
Route::post('/dashboard/subkriteria/delete', [AdminController::class, 'delete_subkriteria'])->name('/dashboard/subkriteria/delete');
Route::get('/dashboard/subkriteria/edit/{id}', [AdminController::class, 'edit_subkriteria'])->name('/dashboard/subkriteria/edit');
Route::post('/dashboard/subkriteria/update', [AdminController::class, 'update_subkriteria'])->name('/dashboard/subkriteria/update');

Route::get('/dashboard/perhitungan', [AdminController::class, 'perhitungan'])->name('/dashboard/perhitungan');
Route::post('/dashboard/alternatif', [AdminController::class, 'alternatif'])->name('/dashboard/alternatif');

Route::post('/dashboard/keputusan/save', [AdminController::class, 'save_keputusan'])->name('save_keputusan');
Route::post('/dashboard/keputusan/delete', [AdminController::class, 'delete_keputusan'])->name('/dashboard/keputusan/delete');

Route::get('/dashboard/perankingan', [AdminController::class, 'perankingan'])->name('/dashboard/perankingan');
Route::get('/dashboard/perankingan/print', [AdminController::class, 'print_perankingan'])->name('/dashboard/perankingan/print');

//Admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('/dashboard');

//Guest
Route::get('/guest/dashboard', [GuestController::class, 'index'])->name('/guest/dashboard');
Route::get('/guest/siswa', [GuestController::class, 'siswa'])->name('/guest/siswa');
Route::get('/guest/rekomendasi', [GuestController::class, 'rekomendasi'])->name('/guest/rekomendasi');


