<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;

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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //dashboard
    Route::get('dashboard', [Controllers\TasksController::class, 'index'])->name('dashboard');

    //tasks 
    Route::get('/task/create',[Controllers\TasksController::class, 'create'])->name('task.create');
    Route::post('/task/store',[Controllers\TasksController::class, 'store'])->name('task.store');
    Route::get('/task/edit/{id}', [Controllers\TasksController::class, 'edit']);
    Route::patch('/task/update/{id}', [Controllers\TasksController::class, 'update']);
    Route::get('/task/delete/{id}', [Controllers\TasksController::class, 'destroy']);
    Route::get('/task/show/{status?}', [Controllers\TasksController::class, 'showTaskByStatus'])->name('tasks.status');
    

    //historiques
    Route::get('/historical',[Controllers\HistoricalController::class, 'index'])->name('historical');
    Route::get('/getData',[Controllers\HistoricalController::class, 'getData'])->name('historical.getData');
}); 

