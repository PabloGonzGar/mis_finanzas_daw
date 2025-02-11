<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SpendingController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);



//RUTAS DE INCOMES----------------------------------------------------------------------------------------

//INDEX
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');

//CREAR
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::post('/incomes/create', [IncomeController::class, 'store']);

//ACTUALIZAR
Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::post('/incomes/update/{id}', [IncomeController::class, 'update'])->name('incomes.update');

//BORRAR
Route::delete('/incomes/delete/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');


//RUTAS DE SPENDING---------------------------------------------------------------------------------------


Route::get('/spending', [SpendingController::class, 'index'])->name('spending.index');
Route::get('/spending/create', [SpendingController::class, 'create'])->name('spending.create');
Route::post('/spending/create', [SpendingController::class, 'store']);

Route::get('/spending/edit/{id}', [SpendingController::class, 'edit'])->name('spending.edit');
Route::post('/spending/update/{id}', [SpendingController::class, 'update'])->name('spending.update');

Route::delete('/spending/delete/{id}', [SpendingController::class, 'destroy'])->name('spending.destroy');