<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guest\PageController as PageController;

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
//     return view('index');
// });

Route :: get('/index', [PageController::class, 'index']) -> name('index');

Route :: get('/project/create', [PageController::class, 'create']) -> name('auth.create');

Route :: post('/project', [PageController::class, 'store']) -> name('auth.store');

Route :: get('/show/{id}', [PageController::class, 'show'])-> name('auth.show');

Route :: get('/edit/{id}', [PageController::class, 'edit'])-> name('auth.edit');

Route :: put('/update/{id}', [PageController::class, 'update'])-> name('auth.update');

Route :: delete('/project/{id}/picture', [PageController :: class, 'deletePicture'])-> name('auth.picture.delete');




Route :: get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route :: middleware('auth')->group(function () {
    Route :: get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route :: patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route :: delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
