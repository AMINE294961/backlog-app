<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects.tasks', TaskController::class);
    Route::get('/my-tasks', [DashboardController::class, 'myTasks'])->name('my-tasks');
    Route::get('/projects/{project}/kanban', [ProjectController::class, 'kanban'])
    ->name('projects.kanban');
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus']);
    Route::post('/tasks/{task}/comments', [CommentController::class, 'store'])
    ->middleware('auth')->name('comments.store');
});

require __DIR__.'/auth.php';
