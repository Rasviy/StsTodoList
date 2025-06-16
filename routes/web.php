<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});


Route::post('/auth/pegawai/prosesLogin', [PenggunaController::class, 'prosesLogin']);


Route::get('/todo/admin/{id}', [PenggunaController::class, 'adminLogin']); 

Route::get('/admin/berandaTodo/{id}', [TodoController::class, 'berandaTodo'])->name('admin.berandaTodo');
// Route::get('/admin/todo/dataPenugasan/{id}', [TodoController::class, 'dataPenugasan'])->name('admin.dataPenugasan');
Route::get('/admin/todo/penugasanBaru/{id}', [TodoController::class, 'penugasanBaru']);
Route::post('/admin/todo/simpanPenugasanBaru', [TodoController::class, 'simpanPenugasanBaru']);
Route::get('/admin/todo/ubahPenugasan/{id}/{adminId}', [TodoController::class, 'ubahPenugasan']);
Route::get('/admin/todo/simpanPerubahanPenugasan/{id}/{adminId}', [TodoController::class, 'simpanPembaruanTugas']);
Route::get('/admin/todo/hapusPenugasan/{id}', [TodoController::class, 'hapusPenugasan']);
Route::get('/admin/todo/penugasanSelesai/{id}', [TodoController::class, 'penugasanSelesai']);
Route::get('/admin/todo/penugasanDitolak/{id}', [TodoController::class, 'penugasanDitolak']);
Route::get('/admin/todo/rincianPenugasan/{id}', [TodoController::class, 'rincianPenugasan']);


Route::get('/todo/user/login/{id}', [PenggunaController::class, 'login']);
Route::post('/logout', [PenggunaController::class, 'logout']);



Route::get('/todo/mytodo/{id}', [TodoController::class, 'mytodo'])->name('todo.mytodo');
Route::get('/todo/detailTugas/{id}/{idPengguna}', [TodoController::class, 'detailTodo']);
Route::get('/todo/perbaruiTodo/{id}', [TodoController::class, 'perbaruiTodo']);


Route::get('/todo/{id}/todoSelesai', [TodoController::class, 'todoSelesai'])->name('todo.selesai');
Route::get('/todo/{id}/todoDitolak', [TodoController::class, 'todoDitolak'])->name('todo.ditolak');


Route::post('/todo/{id}/{userId}/selesai', [TodoController::class, 'setSelesai'])->name('todo.setSelesai');
Route::post('/todo/{id}/{userId}/tolak', [TodoController::class, 'setDitolak'])->name('todo.setDitolak');

