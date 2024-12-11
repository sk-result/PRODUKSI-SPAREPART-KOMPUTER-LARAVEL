<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('/pc', function () {
    return view('pc');
});
Route::get('/login', function () {
    return view('login');
});


use App\Http\Controllers\SparepartController;


Route::get('/spareparts', [SparepartController::class, 'index'])->name('spareparts.dashboard');
Route::get('/spareparts/create', [SparepartController::class, 'create'])->name('spareparts.create');
Route::post('/spareparts/create', [SparepartController::class, 'store'])->name('spareparts.store');
Route::get('/spareparts/{id}/edit', [SparepartController::class, 'edit'])->name('spareparts.edit');
Route::put('/spareparts/{id}', [SparepartController::class, 'update'])->name('spareparts.update');
Route::delete('/spareparts/{id}', [SparepartController::class, 'destroy'])->name('spareparts.destroy');

// Route::post('/index', [SparepartController::class, 'logout'])->name('index');

use App\Models\Sparepart;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/spareparts/{id}/download-pdf', function ($id) {
    $sparepart = Sparepart::findOrFail($id);
    $pdf = Pdf::loadView('spareparts.pdf', compact('sparepart'));
    return $pdf->download('sparepart-' . $sparepart->id . '.pdf');
})->name('spareparts.download-pdf');

