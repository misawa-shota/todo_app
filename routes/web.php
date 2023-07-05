<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'index']);

// Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
// Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
// Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
// Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todos.show');
// Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
// Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
// Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
Route::resource('todos', TodoController::class);
