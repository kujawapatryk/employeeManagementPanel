<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::redirect('/', '/employees');

Route::group([
    'prefix' => 'employees',
    'namespace' => 'Employees',
    'as' => 'employees.'
], function () {

    Route::get('', [EmployeeController::class, 'index'])
        ->name('list');

    Route::get('/new', [EmployeeController::class, 'create'])
        ->name('create');

    Route::post('/new', [EmployeeController::class, 'store'])
        ->name('store');

    Route::get('{employee}/edit', [EmployeeController::class, 'edit'])
        ->name('edit');

    Route::get('{employee}', [EmployeeController::class, 'showDetails'])
        ->name('show');

    Route::patch('{employee}', [EmployeeController::class, 'update'])
        ->name('update');

    Route::delete('{employee}', [EmployeeController::class, 'remove'])
        ->name('remove');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
