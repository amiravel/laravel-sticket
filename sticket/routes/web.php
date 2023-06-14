<?php


use Illuminate\Support\Facades\Route;
use Sticket\Src\Http\Controllers\CategoriesController;
use Sticket\Src\Http\Controllers\TicketsController;
use Sticket\Src\Http\Controllers\MessagesController;
use Sticket\Src\Http\Controllers\Client\TicketsController as ClientTicketsController;

Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::get('/tickets/{id}', [TicketsController::class, 'show'])->name('tickets.show');
Route::post('/tickets/{id}/messages/store', [MessagesController::class, 'store'])->name('tickets.messages.store');

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::patch('/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

Route::prefix('my')->name('client.')->group(function (){
   Route::get('/tickets', [ClientTicketsController::class, 'index'])->name('tickets.index');
   Route::get('/tickets/create', [ClientTicketsController::class, 'create'])->name('tickets.create');
   Route::post('/ticket', [ClientTicketsController::class, 'store'])->name('tickets.store');
});

