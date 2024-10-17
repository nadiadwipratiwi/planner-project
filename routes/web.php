<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('categories', CategoryController::class);

Route::prefix('/tasks')->name('tasks.')->group(function(){
    Route::get('/add', [TaskController::class, 'create'])->name('create');
    Route::post('/add', [TaskController::class, 'store'])->name('store');
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [TaskController::class, 'update'])->name('update');
    Route::patch('/tasks/{id}/status', [TaskController::class, 'status'])->name('status');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [TaskController::class, 'index']);

